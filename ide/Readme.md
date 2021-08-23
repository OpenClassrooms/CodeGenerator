# PHPStorm Code Generator Menu

To enable a Code Generator tools pop-up menu in PHPStorm, you can import some settings file by
going to `File > Manage IDE settings > Import settings...` and then select the
zip file with the configuration (`code-generator-tools-intellij.zip`).

To build the zip file run the provided `build_code_generator_tools.sh` which will
generate the `code-generator-tools-intellij.zip` in your home folder.

Once imported and PHPStorm restarted, you will have a "Code Generator" pop-up menu entry
when you right-click on project files. Right-click on an Entity class to
be able to generate use cases and controllers, right-click on a use case request DTO class
to generate a View Models architecture.
