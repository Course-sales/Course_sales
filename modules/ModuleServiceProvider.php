<?php 
namespace Modules;

use App\Http\Middleware\BlockUserMiddleware;
use Carbon\Laravel\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Modules\Category\src\Repositories\CategoryRepository;
use Modules\Category\src\Repositories\CategoryRepositoryInterface;
use Modules\Course\src\Repositories\CourseRepository;
use Modules\Course\src\Repositories\CourseRepositoryInterface;
use Modules\Document\src\Repositories\DocumentRepository;
use Modules\Document\src\Repositories\DocumentRepositoryInterface;
use Modules\Lesson\src\Repositories\LessonRepository;
use Modules\Lesson\src\Repositories\LessonRepositoryInterface;
use Modules\Order\src\Repositories\OrderDetailRepository;
use Modules\Order\src\Repositories\OrderDetailRepositoryInterface;
use Modules\Order\src\Repositories\OrderRepository;
use Modules\Order\src\Repositories\OrderRepositoryInterface;
use Modules\Student\src\Models\Coupon;
use Modules\Student\src\Repositories\CouponRepository;
use Modules\Student\src\Repositories\CouponRepositoryInterface;
use Modules\Student\src\Repositories\StudentRepository;
use Modules\Student\src\Repositories\StudentRepositoryInterface;
use Modules\Teacher\src\Repositories\TeacherRepository;
use Modules\Teacher\src\Repositories\TeacherRepositoryInterface;
use Modules\User\src\Repositories\UserRepository;
use Modules\User\src\Repositories\UserRepositoryInterface;
use Modules\Video\src\Repositories\VideoRepository;
use Modules\Video\src\Repositories\VideoRepositoryInterface;

class ModuleServiceProvider extends ServiceProvider {
    private $middlewares = [
        'user.block' => BlockUserMiddleware::class
    ]; 
    private $commands = [
    ];

    public function boot() {
        $modules = $this->getModules();
        if(!empty($modules)) {
            foreach($modules as $module) {
                $this->registerModule($module);
            }
        }
        Paginator::useBootstrapFive();
        $request = request();
        if($request->is('admin') || $request->is('admin/*')) {
            $this->app['router']->pushMiddlewareToGroup('web', 'auth');
        }
    }
    public function registerModule($module) {
        $modulePath =  __DIR__."/{$module}";

        //Khai báo Routes
        Route::middleware('web')->group(function () use ($modulePath) {
            if(File::exists($modulePath.'/routes/web.php')) {
                $this->loadRoutesFrom($modulePath.'/routes/web.php');
            }
        });

        Route::middleware('api')->group(function () use ($modulePath) {
            if(File::exists($modulePath.'/routes/api.php')) {
                $this->loadRoutesFrom($modulePath.'/routes/api.php');
            }
        });

        //Khai báo Migration
        if(File::exists($modulePath.'/migrations')) {
            $this->loadMigrationsFrom($modulePath.'/migrations');
        }
        
        //Khai báo Language
        if(File::exists($modulePath.'/resources/lang')) {
            $this->loadTranslationsFrom($modulePath.'/resources/lang', $module);
            $this->loadJsonTranslationsFrom($modulePath.'/resources/lang');
        }

        //Khai báo view
        if(File::exists($modulePath.'/resources/views')) {
            $this->loadViewsFrom($modulePath.'/resources/views', $module);
        }

        //Khai báo helper
        if(File::exists($modulePath.'/helpers')) {
            $helperList = File::allFiles($modulePath.'/helpers');
            if(!empty($helperList)) {
                foreach($helperList as $helper) {
                    $file = $helper->getPathname();
                    require $file;
                }
            }   
        }
    }

    public function register() {
        // Config
        $modules = $this->getModules();
        if(!empty($modules)) {
            foreach($modules as $module) {
                $this->registerConfig($module);
            }
        }

        // middleware 
        $this->registerMiddleware();

        //Commands
        $this->commands($this->commands);

        //Users
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        //Categories
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        //Courses
        $this->app->singleton(
            CourseRepositoryInterface::class,
            CourseRepository::class
        );

        //Teachers
        $this->app->singleton(
            TeacherRepositoryInterface::class,
            TeacherRepository::class
        );

        //Videos
        $this->app->singleton(
            VideoRepositoryInterface::class,
            VideoRepository::class
        );

        //documents
        $this->app->singleton(
            DocumentRepositoryInterface::class,
            DocumentRepository::class
        );

        //lessons
        $this->app->singleton(
           LessonRepositoryInterface::class,
           LessonRepository::class
        );

        //students
        $this->app->singleton(
            StudentRepositoryInterface::class,
            StudentRepository::class
        );

        
        //orders
        $this->app->singleton(
            OrderRepositoryInterface::class,
            OrderRepository::class
        );

        //order detail
        $this->app->singleton(
            OrderDetailRepositoryInterface::class,
            OrderDetailRepository::class
        );
        //coupon
        $this->app->singleton(
            CouponRepositoryInterface::class,
            CouponRepository::class
        );


    }

    private function getModules() {
        $directories = array_map('basename', File::directories(__DIR__));
        return $directories;
    }

    private function registerConfig($module) {
        $configPath = __DIR__.'/'.$module.'/configs';
                
        if(File::exists($configPath)) {
            $configFiles = array_map('basename', File::allFiles($configPath));

            foreach($configFiles as $config) {
                $alias = basename($config, '.php');
                $this->mergeConfigFrom($configPath.'/'.$config, $alias);
            }
        }
    }

    // register middleware 
    private function registerMiddleware() {
        if(!empty($this->middlewares)) {
            foreach($this->middlewares as $key => $middleware) {
                $this->app['router']->pushMiddlewareToGroup($key, $middleware);
            }
        }
    }

}
