<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Training')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1><?php echo e(__('Manage Training')); ?></h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?php echo e(route('home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
                    <div class="breadcrumb-item"><?php echo e(__('Training')); ?></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4><?php echo e(__('Training List')); ?></h4>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Training')): ?>
                                        <a href="#" data-url="<?php echo e(route('training.create')); ?>" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-title="<?php echo e(__('Create New Training')); ?>">
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
                                            <th><?php echo e(__('Branch')); ?></th>
                                            <th><?php echo e(__('Training Type')); ?></th>
                                            <th><?php echo e(__('Employee')); ?></th>
                                            <th><?php echo e(__('Trainer')); ?></th>
                                            <th><?php echo e(__('Training Duration')); ?></th>
                                            <th><?php echo e(__('Cost')); ?></th>
                                            <?php if( Gate::check('Edit Training') ||Gate::check('Delete Training') ||Gate::check('Show Training')): ?>
                                                <th class="text-right" width="200px"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                        </thead>
                                        <tbody class="font-style">
                                        <?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e(!empty($training->branches)?$training->branches->name:''); ?></td>
                                                <td><?php echo e(!empty($training->types)?$training->types->name:''); ?> <br>

                                                    <?php if($training->status == 0): ?>
                                                        <span class="text-warning"><?php echo e(__($status[$training->status])); ?></span>
                                                    <?php elseif($training->status == 1): ?>
                                                        <span class="text-primary"><?php echo e(__($status[$training->status])); ?></span>
                                                    <?php elseif($training->status == 2): ?>
                                                        <span class="text-success"><?php echo e(__($status[$training->status])); ?></span>
                                                    <?php elseif($training->status == 3): ?>
                                                        <span class="text-info"><?php echo e(__($status[$training->status])); ?></span>
                                                    <?php endif; ?>

                                                </td>
                                                <td><?php echo e(!empty($training->employees)?$training->employees->name:''); ?> </td>
                                                <td><?php echo e(!empty($training->trainers)?$training->trainers->firstname:''); ?></td>
                                                <td><?php echo e(\Auth::user()->dateFormat($training->start_date) .' to '.\Auth::user()->dateFormat($training->end_date)); ?></td>
                                                <td><?php echo e(\Auth::user()->priceFormat($training->training_cost)); ?></td>
                                                <?php if( Gate::check('Edit Training') ||Gate::check('Delete Training') || Gate::check('Show Training')): ?>
                                                    <td class="text-right">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Training')): ?>
                                                            <a href="<?php echo e(route('training.show',\Illuminate\Support\Facades\Crypt::encrypt($training->id))); ?>" class="btn btn-outline-warning btn-sm mr-1"><i class="fas fa-eye"></i> <span><?php echo e(__('Show')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Training')): ?>
                                                            <a href="#" data-url="<?php echo e(route('training.edit',$training->id)); ?>" data-size="lg" data-ajax-popup="true" data-title="<?php echo e(__('Edit Training')); ?>" class="btn btn-outline-primary btn-sm mr-1"><i class="fas fa-pencil-alt"></i> <span><?php echo e(__('Edit')); ?></span></a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Training')): ?>
                                                            <a href="#" class="btn btn-outline-danger btn-sm" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-<?php echo e($training->id); ?>').submit();"><i class="fas fa-trash"></i> <span><?php echo e(__('Delete')); ?></span></a>
                                                            <?php echo Form::open(['method' => 'DELETE', 'route' => ['training.destroy', $training->id],'id'=>'delete-form-'.$training->id]); ?>

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




<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/training/index.blade.php ENDPATH**/ ?>