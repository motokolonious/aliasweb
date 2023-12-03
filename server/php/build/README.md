# PHP DOCROOT
PHP's web development server uses a --docroot option to find requested resources. The build_docroot* scripts copy all necessary files into a docroot directory for testing.

Once PHP is installed use a command like `php.exe -S localhost:8000 --docroot {FullPathToDocRootDirectory}`
- -S is for server. Use a web browser and go to http://localhost:8000/index.php to start testing.
- This is a development server only. Use a closed local port (one that is not open for networking).
