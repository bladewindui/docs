<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\McpController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'docs/index')->name('home');
Route::view('install', 'docs/install');
Route::view('customize', 'docs/customize');
Route::view('customize/colours', 'docs/colours');
Route::view('customize/darkmode', 'docs/darkmode');
Route::view('component/accordion', 'docs/accordion');
Route::view('component/alert', 'docs/alert');
Route::view('component/avatar', 'docs/avatar');
Route::view('component/bell', 'docs/bell');
Route::view('component/button', 'docs/button');
Route::view('component/card', 'docs/card');
Route::view('component/centered-content', 'docs/centered-content');
Route::view('component/checkbox', 'docs/checkbox');
Route::view('component/chart', 'docs/chart');
Route::view('component/checkcard', 'docs/checkcard');
Route::view('component/datepicker', 'docs/datepicker');
Route::view('component/colorpicker', 'docs/colorpicker');
Route::view('component/dropmenu', 'docs/dropmenu');
Route::view('component/empty-state', 'docs/emptystate');
Route::view('component/filepicker', 'docs/filepicker');
Route::view('component/horizontal-line-graph', 'docs/horizontal-line-graph');
Route::view('contribute', 'docs/contribute');
Route::view('mcp', 'docs/mcp');

Route::post('mcp/server', [McpController::class, 'handle']);
Route::view('component/icon', 'docs/icon');
Route::view('component/input', 'docs/input');
Route::view('component/list-view', 'docs/list');
Route::view('component/modal', 'docs/modal');
Route::view('component/notification', 'docs/notification');
Route::view('component/number', 'docs/number');
Route::view('component/popover', 'docs/popover');
Route::view('component/process-indicator', 'docs/process-indicator');
Route::view('component/progress-bar', 'docs/progress-bar');
Route::view('component/progress-circle', 'docs/progress-circle');
Route::view('component/radio-button', 'docs/radiobutton');
Route::view('component/rating', 'docs/rating');
Route::view('roadmap', 'docs/roadmap');
Route::view('component/select', 'docs/select');
Route::view('component/shimmer', 'docs/shimmer');
Route::view('component/slider', 'docs/slider');
Route::view('component/spinner', 'docs/spinner');
Route::view('component/statistic', 'docs/statistic');
Route::view('component/tab', 'docs/tab');
Route::view('component/table', 'docs/table');
Route::view('component/tag', 'docs/tag');
Route::view('component/textarea', 'docs/textarea');
Route::view('component/textbox', 'docs/input');
Route::view('component/timeline', 'docs/timeline');
Route::view('component/theme-switcher', 'docs/theme-switcher');
Route::view('component/timepicker', 'docs/timepicker');
Route::view('component/toggle', 'docs/toggle');
Route::view('component/tooltip', 'docs/tooltip');
Route::view('component/verification-code', 'docs/code');
Route::view('extra/app-layouts', 'docs/app-layouts');
Route::view('extra/error-pages', 'docs/error-pages');
Route::view('extra/helper-functions', 'docs/helpers');
Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');
Route::post('/upload-delete', [FileUploadController::class, 'delete']);
Route::post('/manual-upload', [FileUploadController::class, 'manual_upload']);
Route::post('/base64-upload', [FileUploadController::class, 'base64_upload']);

// Test route for BladewindServiceProvider
Route::get('/test-bladewind', function () {
    try {
        app()->register(\Mkocansey\Bladewind\BladewindServiceProvider::class);
        return 'Bladewind service provider registered successfully!';
    } catch (Exception $e) {
        return 'Error registering Bladewind service provider: ' . $e->getMessage();
    }
});
