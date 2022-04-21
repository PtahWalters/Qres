<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Leave')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>


<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Leave')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Leave')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <?php echo e(Form::open(array('route' => array('report.leave'),'method'=>'get'))); ?>

                                <div class="row">
                                    <div class="col">
                                        <h4 class="h4 mb-0"><?php echo e(__('Filter')); ?></h4>
                                    </div>
                                    <div class="col-md-2">
                                        <?php echo e(Form::label('employee', __('Employee'))); ?>

                                        <?php echo e(Form::select('employee', $employeesList,isset($_GET['employee'])?$_GET['employee']:'', array('class' => 'form-control select2'))); ?>

                                    </div>

                                    <div class="col-auto apply-btn">
                                        <?php echo e(Form::submit(__('Apply'),array('class'=>'btn btn-outline-primary btn-sm'))); ?>

                                        <a href="<?php echo e(route('report.leave')); ?>" class="btn btn-outline-danger btn-sm"><?php echo e(__('Reset')); ?></a>
                                    </div>
                                </div>
                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive py-4">
                                    <table class="table table-striped mb-0" id="dataTable">
                                        <thead class="thead-light">
                                        <tr>
                                            <th><?php echo e(__('Employee')); ?></th>
                                            <th><?php echo e(__('Approved Leaves')); ?></th>
                                            <th><?php echo e(__('Rejected Leaves')); ?></th>
                                            <th><?php echo e(__('Pending Leaves')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($leave['employee']); ?></td>
                                                <td>

                                                    <a href="#!" data-url="<?php echo e(route('report.employee.leave',[$leave['id'],'Approve'])); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Approved Leave Detail')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('View')); ?>">
                                                        <span class="badge badge-success mr-2"><?php echo e($leave['approved']); ?></span> <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#!" data-url="<?php echo e(route('report.employee.leave',[$leave['id'],'Reject'])); ?>" class="table-action table-action-delete" data-ajax-popup="true" data-title="<?php echo e(__('Rejected Leave Detail')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('View')); ?>">
                                                        <span class="badge badge-danger mr-2"><?php echo e($leave['reject']); ?></span> <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#!" data-url="<?php echo e(route('report.employee.leave',[$leave['id'],'Pending'])); ?>" class="table-action table-action-delete" data-ajax-popup="true" data-title="<?php echo e(__('Pending Leave Detail')); ?>" data-toggle="tooltip" data-original-title="<?php echo e(__('View')); ?>">
                                                        <span class="badge badge-primary mr-2"><?php echo e($leave['pending']); ?></span> <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/report/leave.blade.php ENDPATH**/ ?>