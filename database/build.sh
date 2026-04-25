#!/bin/sh
# dash script

# Simple integer range based on the provided increment and maximum. Always starts at 0.
zrange() {
    local inc
    local incmax
    local z=0
    while (test $z -lt $incmax -o $z -eq $incmax)
    do
        echo $z
        z=$(($z + $inc))
    done
}

# Outputs all database version file paths in a given directory
dbvdirf() {
    local dbvdirf
    if (test -d $dbvdirf)
    then
        for f in $(ls -1 $dbvdirf)
        do echo "$dbvdirf/$f"
        done
    fi
}

# Outputs all database version file paths
dbvfps() {
    local dbvfps
    inc=100
    incmax=3100
    for z in $(zrange)
    do
        if (test -d "$dbvfps/$z")
        then {
            dbvdirf="$dbvfps/$z"
            dbvdirf
        }
        else break
        fi
    done
}

# Outputs all database versions alongside their relative file paths
dbvdirv() {
    local dbvdir
    dbvfps="$dbvdir"
    for fp in $(dbvfps)
    do
        fp_field_count=$(echo $fp | grep -o / | wc -l) # Use awk instead?
        fp_field_count_pl1=$(($fp_field_count+1))
        dbv=$(echo $fp | cut -d / -f $fp_field_count_pl1  | tr -d [:alpha:]_./)
        echo "$dbv|$fp" # default IFS includes space, which causes unwanted field splitting, so use | here instead
    done
}

# Outputs sorted database versions alongside their relative file paths
dbvlist() {
    local dbvdir
    # It's strange that none of the sort options work only on the numbers in the file name string? This is why we output the version first, then sort.
    # The sort command option --key allows us to sort by a specified part, but it's argument won't be obvious since the file names do not have a fixed width.
    # Numerical sort should do okay here, unless someone stacks the same version (creates a sorting tie). Behavior would be non-deterministic in this case.
    for l in $(dbvdirv | sort -n)
    do
        # dbv=$(echo $l | cut -d "|" -f 1)
        # fp=$(echo $l | cut -d "|" -f 2)
        echo $l
    done
}

list_opt=-1
user_opt=-1
verbose_opt=-1
while getopts :lvu:: opt
do {
    if test $opt = "l" -o "$1" = "--list"; then
        list_opt=0
        shift
    fi
    if test $opt = "u"; then
        user_opt=0
        shift
    fi
    if test $opt = "v"; then
        verbose_opt=0
        shift
    fi
}
done

# case to select the database client program which must be specified
case $1 in
    mysql) {
        cmd=mysql #The mariadb-server Debian pkg installed this as an alias for mariadb locally, but on other systems it may point to a proprietary binary, with similar command options to mariadb
    } ;;
    mariadb) {
        cmd=mariadb
    } ;;
    sqlserver) {
        cmd=sqlserver
        echo "The SQL Server build is not yet implemented."
        exit 1
    } ;;
    *) {
        echo "The first argument must be {mysql|mariadb|sqlserver}"
        exit 1
    } ;;
esac
echo "Using command: $cmd."
# Putting $2 here without quotes will cause the test to pass even though no directory arg was specified.
# Localization or unicode numbers should also be considered for all database file directories!
if { test -d "$2" -a -d "$2/0" -a -d "$2/100"; }
then {
    echo "Valid $cmd directories were found. Database versions will be sorted.";
    dbvdir=$2
    if { test $list_opt -eq 0; }
    then { echo "Listing database versions.. no connections or SQL will be executed."; dbvlist; exit 0; }
    fi
    for l in $(dbvlist)
    do
        dbv=$(echo $l | cut -d "|" -f 1)
        fp=$(echo $l | cut -d "|" -f 2)
        if test $verbose_opt -eq 0; then
            echo "Applying database version $dbv at file path $fp"
	    $(exec $cmd <$fp)
	    else $(exec $cmd <$fp >/dev/null)
        fi
    done
}
else {
    echo "Required $cmd directories not found!";
    exit 2;
}
fi
