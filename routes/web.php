<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Middleware\TokenVerificationMiddleware;


Route::get('/', function () {
    return view('layout.app');
});

//User API
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/user-login', [UserController::class, 'UserLogin']);
Route::post('/send-otp', [UserController::class, 'SendOTPToEMail']);
Route::post('/verify-otp', [UserController::class, 'OTPVerify']);
//Token verify
Route::post('/reset-password', [UserController::class, 'SetPassword'])->middleware(TokenVerificationMiddleware::class);
//logout
Route::get('/user-logout', [UserController::class, 'UserLogout']);
Route::post('/user-profile', [UserController::class, 'UserProfile'])->middleware(TokenVerificationMiddleware::class);
Route::post('/user-update', [UserController::class, 'UserUpdate'])->middleware(TokenVerificationMiddleware::class);

//category API
Route::get('/list-category', [CategoryController::class, 'ListCategory'])->middleware(TokenVerificationMiddleware::class);
Route::post('/category-create', [CategoryController::class, 'CategoryCreate'])->middleware(TokenVerificationMiddleware::class);
Route::post('/category-update', [CategoryController::class, 'CategoryUpdate'])->middleware(TokenVerificationMiddleware::class);
Route::post('/category-delete', [CategoryController::class, 'CategoryDelete'])->middleware(TokenVerificationMiddleware::class);
Route::post('/category-by-id', [CategoryController::class, 'CategoryById'])->middleware(TokenVerificationMiddleware::class);

//customer API
Route::get('/list-customer', [CustomerController::class, 'ListCustomer'])->middleware(TokenVerificationMiddleware::class);
Route::post('/customer-create', [CustomerController::class, 'CustomerCreate'])->middleware(TokenVerificationMiddleware::class);
Route::post('/customer-update', [CustomerController::class, 'CustomerUpdate'])->middleware(TokenVerificationMiddleware::class);
Route::post('/customer-delete', [CustomerController::class, 'CustomerDelete'])->middleware(TokenVerificationMiddleware::class);
Route::post('/customer-by-id', [CustomerController::class, 'CustomerById'])->middleware(TokenVerificationMiddleware::class);

//product API
Route::get('/list-product', [ProductController::class, 'ListProduct'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product-create', [ProductController::class, 'ProductCreate'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product-update', [ProductController::class, 'ProductUpdate'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product-delete', [ProductController::class, 'ProductDelete'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product-by-id', [ProductController::class, 'ProductById'])->middleware(TokenVerificationMiddleware::class);
Route::post('/product-by-category', [ProductController::class, 'ProductByCategory'])->middleware(TokenVerificationMiddleware::class);


//Invoice API

Route::post('/invoice-create', [InvoiceController::class, 'InvoiceCreate'])->middleware(TokenVerificationMiddleware::class);
Route::get('/invoice-select', [InvoiceController::class, 'InvoiceSelect'])->middleware(TokenVerificationMiddleware::class);
Route::post('/invoice-details', [InvoiceController::class, 'InvoiceDetails'])->middleware(TokenVerificationMiddleware::class);
Route::post('/invoice-delete', [InvoiceController::class, 'InvoiceDelete'])->middleware(TokenVerificationMiddleware::class);


//pages routes
Route::get('/userRegistration', [UserController::class, 'UserRegistrationPage']);
Route::get('/userLogin', [UserController::class, 'UserLoginPage']);
Route::get('/sendOtp', [UserController::class, 'SendOTPCodePage']);
Route::get('/verifyOtp', [UserController::class, 'VerifyOTPPage']);
Route::get('/resetPassword', [UserController::class, 'ResetPasswordPage'])->middleware(TokenVerificationMiddleware::class);
Route::get('/userProfile', [UserController::class, 'ProfilePage'])->middleware(TokenVerificationMiddleware::class);
//after auth
Route::get('/dashboard', [UserController::class, 'DashboardPage'])->middleware(TokenVerificationMiddleware::class);

Route::get('/categoryPage', [CategoryController::class, 'CategoryPage'])->middleware(TokenVerificationMiddleware::class);
Route::get('/customerPage', [CustomerController::class, 'CustomerPage'])->middleware(TokenVerificationMiddleware::class);
Route::get('/productPage', [ProductController::class, 'ProductPage'])->middleware(TokenVerificationMiddleware::class);
Route::get('/invoicePage', [InvoiceController::class, 'InvoicePage'])->middleware(TokenVerificationMiddleware::class);
Route::get('/invoiceProductPage', [InvoiceProductController::class, 'InvoiceProductPage'])->middleware(TokenVerificationMiddleware::class);
Route::get('/reportPage', [InvoiceController::class, 'ReportPage'])->middleware(TokenVerificationMiddleware::class);



Route::resource('income_categories', IncomeCategoryController::class);

// Expense Categories
Route::resource('expense_categories', ExpenseCategoryController::class);

// Incomes
Route::resource('incomes', IncomeController::class);

// Expenses
Route::resource('expenses', ExpenseController::class);


Route::post('createExpense', [ExpenseController::class, 'CreateExpense']);
