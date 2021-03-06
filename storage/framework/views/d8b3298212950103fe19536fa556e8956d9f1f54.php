<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Attendance')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Attendance')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Attendance')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Attendance List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Attendance')): ?>
                                        <a href="#" data-url="<?php echo e(route('attendanceemployee.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="<?php echo e(__('Add Attendance')); ?>" data-original-title="<?php echo e(__('Add Attendance')); ?>">
                                            <i class="fa fa-plus"></i> <?php echo e(__('Create')); ?>

                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0" id="dataTable">
                                        <thead>
                                        <tr>
                                            <?php if(\Auth::user()->type!='employee'): ?>
                                                <th><?php echo e(__('Employee')); ?></th>
                                            <?php endif; ?>
                                            <th><?php echo e(__('Date')); ?></th>
                                            <th><?php echo e(__('Status')); ?></th>
                                            <th><?php echo e(__('Clock In')); ?></th>
                                            <th><?php echo e(__('Clock Out')); ?></th>
                                            <th><?php echo e(__('Late')); ?></th>
                                            <th><?php echo e(__('Early Leaving')); ?></th>
                                            <th><?php echo e(__('Overtime')); ?></th>
                                            <?php if(Gate::check('Edit Attendance') || Gate::check('Delete Attendance')): ?>
                                                <th><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $attendanceEmployee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attendance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <?php if(\Auth::user()->type!='employee'): ?>
                                                    <td><?php echo e(!empty(\Auth::user()->getUSerEmployee($attendance->employee_id))?\Auth::user()->getUSerEmployee($attendance->employee_id)->name:''); ?></td>
                                                <?php endif; ?>
                                                <td><?php echo e(\Auth::user()->dateFormat($attendance->date)); ?></td>
                                                <td><?php echo e($attendance->status); ?></td>
                                                <td><?php echo e(\Auth::user()->timeFormat( $attendance->clock_in)); ?></td>
                                                <td><?php echo e(($attendance->clock_out !='00:00:00') ?\Auth::user()->timeFormat( $attendance->clock_out):'00:00'); ?></td>
                                                <td><?php echo e($attendance->late); ?></td>
                                                <td><?php echo e($attendance->early_leaving); ?></td>
                                                <td><?php echo e($attendance->overtime); ?></td>
                                                <?php if(Gate::check('Edit Attendance') || Gate::check('Delete Attendance')): ?>
                                                    <td>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Attendance')): ?>
                                                            <a href="#" data-url="<?php echo e(URL::to('attendanceemployee/'.$attendance->id.'/edit')); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Attendance')); ?>" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="<?php echo e(__('Edit')); ?>"><i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Attendance')): ?>
                                                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="<?php echo e(__('Delete')); ?>" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($attendance->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['attendanceemployee.destroy', $attendance->id],'id'=>'delete-form-'.$attendance->id]); ?>

                                                            <?php echo Form::close(); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>
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

<?php $__env->startPush('script-page'); ?>
    <script>
        $(document).ready(function () {
            $('.daterangepicker').daterangepicker({
                format: 'yyyy-mm-dd',
                locale: {format: 'YYYY-MM-DD'},
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/attendance/index.blade.php ENDPATH**/ ?>