<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\setting\SettingController;
use App\Http\Controllers\setting\SettingGeneralRoleController;
use App\Http\Controllers\OfficerSystem\OfficerSystemSettingGeneral;
use App\Http\Controllers\StudentSystem\StudentSystemSettingGeneral;
use App\Http\Controllers\TeacherSystem\TeacherSystemSettingGeneral;
use App\Http\Controllers\OfficerSystem\OfficerSystemBudgetAllowance;
use App\Http\Controllers\OfficerSystem\OfficerSystemSettingActivity;
use App\Http\Controllers\OfficerSystem\OfficerSystemActivityActivity;
use App\Http\Controllers\OfficerSystem\OfficerSystemBudgetAllocation;
use App\Http\Controllers\OfficerSystem\OfficerSystemManagementStudent;
use App\Http\Controllers\OfficerSystem\OfficerSystemSettingAssessment;
use App\Http\Controllers\TeacherSystem\TeacherSystemManagementStudent;
use App\Http\Controllers\StudentSystem\StudentSystemManagementActivity;
use App\Http\Controllers\setting\SettingGeneralAssignmentRoleController;
use App\Http\Controllers\OfficerSystem\OfficerSystemAssessmentAssessment;
use App\Http\Controllers\TeacherSystem\TeacherSystemManagementAssessment;
use App\Http\Controllers\OfficerSystem\OfficerSystemManagementTransaction;
use App\Http\Controllers\StudentSystem\StudentSystemManagementTransaction;
use App\Http\Controllers\TeacherSystem\TeacherSystemManagementTransaction;
use App\Http\Controllers\OfficerSystem\OfficerSystemManagementTransferList;
use App\Http\Controllers\OfficerSystem\OfficerSystemSettingPaymentCondition;
use App\Http\Controllers\OfficerSystem\OfficerSystemManagementTransferResult;
use App\Http\Controllers\OfficerSystem\OfficerSystemSettingAttachmentRequest;
use App\Http\Controllers\OfficerSystem\OfficerSystemBudgetAllowanceAllocation;
use App\Http\Controllers\setting\SettingGeneralAssignmentGroupModuleController;
use App\Http\Controllers\OfficerSystem\OfficerSystemManagementTransactionRevise;
use App\Http\Controllers\OfficerSystem\OfficerSystemSettingAssessmentAssignment;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/group/{id}', [GroupController::class, 'index'])->name('group.index');
        Route::group(['prefix' => 'setting', 'middleware' => 'admin'], function () {
            Route::get('', [SettingController::class, 'index'])->name('setting');
            Route::group(['prefix' => 'general'], function () {
                Route::group(['prefix' => 'role'], function () {
                    Route::get('', [SettingGeneralRoleController::class, 'index'])->name('setting.general.role');
                    Route::post('store', [SettingGeneralRoleController::class, 'store'])->name('setting.general.role.store');
                    Route::get('{id}', [SettingGeneralRoleController::class, 'view'])->name('setting.general.role.view');
                    Route::put('{id}', [SettingGeneralRoleController::class, 'update'])->name('setting.general.role.update');
                    Route::delete('{id}', [SettingGeneralRoleController::class, 'delete'])->name('setting.general.role.delete');
                });
                Route::group(['prefix' => 'assignment'], function () {
                    Route::group(['prefix' => 'group-module'], function () {
                        Route::post('store', [SettingGeneralAssignmentGroupModuleController::class, 'store'])->name('setting.general.assignment.group-module.store');
                        Route::delete('roles/{roleId}/groups/{groupId}/delete', [SettingGeneralAssignmentGroupModuleController::class, 'delete'])->name('setting.general.assignment.group-module.delete');
                        Route::get('{id}', [SettingGeneralAssignmentGroupModuleController::class, 'view'])->name('setting.general.assignment.group-module.view');
                        Route::post('update-module-json', [SettingGeneralAssignmentGroupModuleController::class, 'updateModuleJson'])->name('setting.general.assignment.group-module.update-module-json');
                    });

                    Route::group(['prefix' => 'role'], function () {
                        Route::post('store', [SettingGeneralAssignmentRoleController::class, 'store'])->name('setting.general.assignment.role.store');
                        Route::get('roles/{roleId}/users/{userId}/delete', [SettingGeneralAssignmentRoleController::class, 'delete'])->name('setting.general.assignment.role.delete');
                    });
                });
                
            });
        });
        Route::group(['prefix' => 'groups'], function () {
        Route::group(['prefix' => 'officer-system'], function () {
            Route::group(['prefix' => 'budget'], function () {
                Route::group(['prefix' => 'allowance'], function () {
                    Route::get('', [OfficerSystemBudgetAllowance::class, 'index'])->name('groups.officer-system.budget.allowance');
                    Route::get('create', [OfficerSystemBudgetAllowance::class, 'create'])->name('groups.officer-system.budget.allowance.create');
                    Route::group(['prefix' => 'allowance'], function () {
                        Route::get('{id}', [OfficerSystemBudgetAllowanceAllocation::class, 'index'])->name('groups.officer-system.budget.allowance.allocation');
                        Route::get('create/{id}', [OfficerSystemBudgetAllowanceAllocation::class, 'create'])->name('groups.officer-system.budget.allowance.allocation.create');
                        Route::get('view/{id}', [OfficerSystemBudgetAllowanceAllocation::class, 'view'])->name('groups.officer-system.budget.allowance.allocation.view');
                    });
                });
                Route::group(['prefix' => 'allocation'], function () {
                    Route::get('', [OfficerSystemBudgetAllocation::class, 'index'])->name('groups.officer-system.budget.allocation');
                });
            });
            Route::group(['prefix' => 'management'], function () {
                Route::group(['prefix' => 'transaction'], function () {
                    Route::get('', [OfficerSystemManagementTransaction::class, 'index'])->name('groups.officer-system.management.transaction');
                    Route::get('{id}', [OfficerSystemManagementTransaction::class, 'view'])->name('groups.officer-system.management.transaction.view');
                    Route::group(['prefix' => 'revise'], function () {
                        Route::get('{id}', [OfficerSystemManagementTransactionRevise::class, 'index'])->name('groups.officer-system.management.transaction.revise');
                        Route::get('create/{id}', [OfficerSystemManagementTransactionRevise::class, 'create'])->name('groups.officer-system.management.transaction.revise.create');
                    });
                });
                Route::group(['prefix' => 'student'], function () {
                    Route::get('', [OfficerSystemManagementStudent::class, 'index'])->name('groups.officer-system.management.student');
                });
                Route::group(['prefix' => 'transfer-list'], function () {
                    Route::get('', [OfficerSystemManagementTransferList::class, 'index'])->name('groups.officer-system.management.transfer-list');
                });
                Route::group(['prefix' => 'transfer-result'], function () {
                    Route::get('', [OfficerSystemManagementTransferResult::class, 'index'])->name('groups.officer-system.management.transfer-result');
                });
            });

            Route::group(['prefix' => 'assessment'], function () {
                Route::group(['prefix' => 'assessment'], function () {
                    Route::get('', [OfficerSystemAssessmentAssessment::class, 'index'])->name('groups.officer-system.assessment.assessment');
                    Route::get('evaluate/{id}', [OfficerSystemAssessmentAssessment::class, 'evaluate'])->name('groups.officer-system.assessment.assessment.evaluate');
                });
            });

            Route::group(['prefix' => 'activity'], function () {
                Route::group(['prefix' => 'activity'], function () {
                    Route::get('', [OfficerSystemActivityActivity::class, 'index'])->name('groups.officer-system.activity.activity');
                    Route::get('view/{id}', [OfficerSystemActivityActivity::class, 'view'])->name('groups.officer-system.activity.activity.view');
                });
            });


            Route::group(['prefix' => 'setting'], function () {
                Route::group(['prefix' => 'general'], function () {
                    Route::get('', [OfficerSystemSettingGeneral::class, 'index'])->name('groups.officer-system.setting.general');
                });
                Route::group(['prefix' => 'attachment-request'], function () {
                    Route::get('', [OfficerSystemSettingAttachmentRequest::class, 'index'])->name('groups.officer-system.setting.attachment-request');
                });
                Route::group(['prefix' => 'payment-condition'], function () {
                    Route::get('', [OfficerSystemSettingPaymentCondition::class, 'index'])->name('groups.officer-system.setting.payment-condition');
                    Route::get('{id}', [OfficerSystemSettingPaymentCondition::class, 'view'])->name('groups.officer-system.setting.payment-condition.view');
                });
                Route::group(['prefix' => 'assessment'], function () {
                    Route::get('', [OfficerSystemSettingAssessment::class, 'index'])->name('groups.officer-system.setting.assessment');
                    Route::get('create', [OfficerSystemSettingAssessment::class, 'create'])->name('groups.officer-system.setting.assessment.create');
                    Route::group(['prefix' => 'assignment'], function () {
                        Route::get('{id}', [OfficerSystemSettingAssessmentAssignment::class, 'index'])->name('groups.officer-system.setting.assessment.assignment');
                        Route::get('create/{id}', [OfficerSystemSettingAssessmentAssignment::class, 'create'])->name('groups.officer-system.setting.assessment.assignment.create');
                    });
                    
                });
                Route::group(['prefix' => 'activity'], function () {
                    Route::get('', [OfficerSystemSettingActivity::class, 'index'])->name('groups.officer-system.setting.activity');
                    Route::get('create', [OfficerSystemSettingActivity::class, 'create'])->name('groups.officer-system.setting.activity.create');
                });
            });
        });
        Route::group(['prefix' => 'teacher-system'], function () {
            Route::group(['prefix' => 'management'], function () {
                Route::group(['prefix' => 'transaction'], function () {
                    Route::get('', [TeacherSystemManagementTransaction::class, 'index'])->name('groups.teacher-system.management.transaction');
                });
                Route::group(['prefix' => 'student'], function () {
                    Route::get('', [TeacherSystemManagementStudent::class, 'index'])->name('groups.teacher-system.management.student');
                });
                Route::group(['prefix' => 'assessment'], function () {
                    Route::get('', [TeacherSystemManagementAssessment::class, 'index'])->name('groups.teacher-system.management.assessment');
                    Route::get('create', [TeacherSystemManagementAssessment::class, 'create'])->name('groups.teacher-system.management.assessment.create');
                });
            });
            Route::group(['prefix' => 'setting'], function () {
                Route::group(['prefix' => 'general'], function () {
                    Route::get('', [TeacherSystemSettingGeneral::class, 'index'])->name('groups.teacher-system.setting.general');
                });
            });
        });

        Route::group(['prefix' => 'student-system'], function () {
            Route::group(['prefix' => 'management'], function () {
                Route::group(['prefix' => 'transaction'], function () {
                    Route::get('', [StudentSystemManagementTransaction::class, 'index'])->name('groups.student-system.management.transaction');
                    Route::get('view/{id}', [StudentSystemManagementTransaction::class, 'view'])->name('groups.student-system.management.transaction.view');
                    Route::get('create', [StudentSystemManagementTransaction::class, 'create'])->name('groups.student-system.management.transaction.create');
                });
                Route::group(['prefix' => 'activity'], function () {
                    Route::get('', [StudentSystemManagementActivity::class, 'index'])->name('groups.student-system.management.activity');
                    Route::get('create', [StudentSystemManagementActivity::class, 'create'])->name('groups.student-system.management.activity.create');
                });
            });
            Route::group(['prefix' => 'setting'], function () {
                Route::group(['prefix' => 'general'], function () {
                    Route::get('', [StudentSystemSettingGeneral::class, 'index'])->name('groups.student-system.setting.general');
                });
            });
        });
    });

    Route::group(['prefix' => 'api'], function () {
        Route::get('get-group', [ApiController::class, 'getGroup'])->name('api.get-group');
        Route::post('get-module-json', [ApiController::class, 'getModuleJson'])->name('api.get-module-json');
        Route::get('get-user', [ApiController::class, 'getUser'])->name('api.get-user');
    });
});


        


