<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class Module extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create module CLI';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        if(File::exists(base_path('modules/'.$name))) {
            $this->error('Module already exists!');
            return 1;

        }else{
            File::makeDirectory(base_path('modules/'.$name), 0755, true, true);

            //configs
            // $configFolder = base_path('modules/'.$name.'/configs');
            // if(!File::exists($configFolder)) {
            //     File::makeDirectory($configFolder, 0755, true, true);
            // }

            //helpers
            $helperFolder = base_path('modules/'.$name.'/helpers');
            if(!File::exists($helperFolder)) {
                File::makeDirectory($helperFolder, 0755, true, true);
            }

            //migrations
            $migrationFolder = base_path('modules/'.$name.'/migrations');
            if(!File::exists($migrationFolder)) {
                File::makeDirectory($migrationFolder, 0755, true, true);
            }

            //resources
            $resourceFolder = base_path('modules/'.$name.'/resources');
            if(!File::exists($resourceFolder)) {
                File::makeDirectory($resourceFolder, 0755, true, true);

                //lang
                $langFolder = base_path('modules/'.$name.'/resources/lang');
                if(!File::exists($langFolder)) {
                    File::makeDirectory($langFolder, 0755, true, true);

                    //en
                    $enFolder = base_path('modules/'.$name.'/resources/lang/en');
                    if(!File::exists($enFolder)) {
                        File::makeDirectory($enFolder, 0755, true, true);
                    }
                }

                //views
                $viewFolder = base_path('modules/'.$name.'/resources/views');
                if(!File::exists($viewFolder)) {
                    File::makeDirectory($viewFolder, 0755, true, true);

                    // //layouts
                    // $layoutFolder = base_path('modules/'.$name.'/resources/views/layouts');
                    // if(!File::exists($layoutFolder)) {
                    //     File::makeDirectory($layoutFolder, 0755, true, true);
                    // }
                }
            }

            //routes
            $routenFolder = base_path('modules/'.$name.'/routes');
            if(!File::exists($routenFolder)) {
                File::makeDirectory($routenFolder, 0755, true, true);

                //file routes
                $routeFile = base_path('modules/'.$name.'/routes/web.php');
                if(!File::exists($routeFile)) {
                    $moduleRouteFileContent = file_get_contents(app_path('Console/Commands/Templates/ModuleRoute.txt'));
                    $moduleRouteFileContent = str_replace('{module}', $name, $moduleRouteFileContent);
                    File::put($routeFile, $moduleRouteFileContent);
                }
            }

            //src
            $srcFolder = base_path('modules/'.$name.'/src');
            if(!File::exists($srcFolder)) {
                File::makeDirectory($srcFolder, 0755, true, true);

                //Commands
                // $commandFolder = base_path('modules/'.$name.'/src/Commands');
                // if(!File::exists($commandFolder)) {
                //     File::makeDirectory($commandFolder, 0755, true, true);
                // }

                //Http
                $httpFolder = base_path('modules/'.$name.'/src/Http');
                if(!File::exists($httpFolder)) {
                    File::makeDirectory($httpFolder, 0755, true, true);

                    //Controller
                    $controllerFolder = base_path('modules/'.$name.'/src/Http/Controllers');
                    if(!File::exists($controllerFolder)) {
                        File::makeDirectory($controllerFolder, 0755, true, true);

                        //file controller 
                        $moduleController = base_path('modules/'.$name.'/src/Http/Controllers/'.$name.'Controller.php');
                        if(!File::exists($moduleController)) {
                            $moduleControllerFileContent = file_get_contents(app_path('Console/Commands/Templates/ModuleController.txt'));
                            $moduleControllerFileContent = str_replace('{module}', $name, $moduleControllerFileContent);
                            File::put($moduleController, $moduleControllerFileContent);
                        }
                    }

                    //Middlewares
                    $middlewareFolder = base_path('modules/'.$name.'/src/Http/Middlewares');
                    if(!File::exists($middlewareFolder)) {
                        File::makeDirectory($middlewareFolder, 0755, true, true);
                    }

                }

                //Models
                $modelFolder = base_path('modules/'.$name.'/src/Models');
                if(!File::exists($modelFolder)) {
                    File::makeDirectory($modelFolder, 0755, true, true);

                    //file Model
                    $moduleModel = base_path('modules/'.$name.'/src/Models/'.$name.'.php');
                    if(!File::exists($moduleModel)) {
                        $moduleModelFileContent = file_get_contents(app_path('Console/Commands/Templates/ModuleModel.txt'));
                        $moduleModelFileContent = str_replace('{module}', $name, $moduleModelFileContent);
                        File::put($moduleModel, $moduleModelFileContent);
                    }
                }

                //Repositories
                $repositoryFolder = base_path('modules/'.$name.'/src/Repositories');
                if(!File::exists($repositoryFolder)) {
                    File::makeDirectory($repositoryFolder, 0755, true, true);

                    //module repositories
                    $moduleRepository = base_path('modules/'.$name.'/src/Repositories/'.$name.'Repository.php');
                    if(!File::exists($moduleRepository)) {
                        $moduleRepositoryFileContent = file_get_contents(app_path('Console/Commands/Templates/ModuleRepository.txt'));
                        $moduleRepositoryFileContent = str_replace('{module}', $name, $moduleRepositoryFileContent);
                        File::put($moduleRepository, $moduleRepositoryFileContent);
                    }

                    //module repositories interface
                    $moduleRepositoryInterface = base_path('modules/'.$name.'/src/Repositories/'.$name.'RepositoryInterface.php');
                    if(!File::exists($moduleRepositoryInterface)) {
                        $moduleRepositoryInterfaceFileContent = file_get_contents(app_path('Console/Commands/Templates/ModuleRepositoryInterface.txt'));
                        $moduleRepositoryInterfaceFileContent = str_replace('{module}', $name, $moduleRepositoryInterfaceFileContent);
                        File::put($moduleRepositoryInterface, $moduleRepositoryInterfaceFileContent);
                    }
                }
            }



            $this->info('Module created successfully!');
        }

    }
}

