<?php echo e(Form::open(array('url'=>'accountlist','method'=>'post'))); ?>

<div class="card-body p-0">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('account_name',__('Account Name'))); ?>

                <?php echo e(Form::text('account_name',null,array('class'=>'form-control','placeholder'=>__('Enter Account Name')))); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('initial_balance',__('Initial Balance'))); ?>

                <?php echo e(Form::number('initial_balance',null,array('class'=>'form-control','placeholder'=>__('Enter Initial Balance')))); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('account_number',__('Account Number'))); ?>

                <?php echo e(Form::number('account_number',null,array('class'=>'form-control','placeholder'=>__('Enter Account Number')))); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('branch_code',__('Branch Code'))); ?>

                <?php echo e(Form::text('branch_code',null,array('class'=>'form-control','placeholder'=>__('Enter Branch Code')))); ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?php echo e(Form::label('bank_branch',__('Bank Branch'))); ?>

                <?php echo e(Form::text('bank_branch',null,array('class'=>'form-control','placeholder'=>__('Enter Bank Branch')))); ?>

            </div>
        </div>
    </div>

</div>
<div class="modal-footer pr-0">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
    <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /var/www/html/resources/views/accountlist/create.blade.php ENDPATH**/ ?>