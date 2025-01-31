<script type="text/javascript">

    var gotoSpace = false;


    // Create a new tour
    var interfaceTour = new Tour({
        storage: false,
        template: '<div class="popover tour"> <div class="arrow"></div> <h3 class="popover-title"></h3> <div class="popover-content"></div> <div class="popover-navigation"> <div class="btn-group"> <button class="btn btn-sm btn-default" data-role="prev"><?php echo Yii::t('TourModule.base', '« Prev'); ?></button> <button class="btn btn-sm btn-default" data-role="next"><?php echo Yii::t('TourModule.base', 'Next »'); ?></button>  </div> <button class="btn btn-sm btn-default" data-role="end"><?php echo Yii::t('TourModule.base', 'End guide'); ?></button> </div> </div>',
        name: 'interface',
        onEnd: function(tour) {
            tourCompleted();
        }
    });


    // Add tour steps
    interfaceTour.addSteps([
        {
            // step 0
            orphan: true,
            backdrop: true,
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_interface', '<strong>Dashboard</strong>')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_guide_interface', "Here is your dashboard!.<br><br>Any new posts, activities or anything that interests you will pop up here!")); ?>
        },
        {
            element: ".dashboard",
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', '<strong>Dashboard</strong>')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', 'Any time you need to get back to the Dashboard, simply click this Dashboard button!')); ?>,
            placement: "bottom"
        },
        {
            element: "#icon-notifications",
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', '<strong>Notifications</strong>')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', 'This is your Notifications panel!<br /><br />This panel will keep you informed of activities and posts that concern you directly.')); ?>,
            placement: "bottom"
        },
        {
            element: "#icon-messages",
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', '<strong>Messages</strong>')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', 'This is your Messages panel!<br /><br />This panel will display all direct messages sent to you!')); ?>,
            placement: "bottom"
        },
        {
            element: "#icon-profile",
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', '<strong>Profile</strong>')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', 'This is the Profile shortcut!<br /><br />Simply click this button to return to your user profile!')); ?>,
            placement: "bottom"
        },
        {
            element: ".dropdown.account",
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', '<strong>Account</strong> Menu')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', 'The account menu gives you access to your private settings and allows you to manage your public profile.')); ?>,
            placement: "bottom"
        },
        {
            element: "#space-menu",
            title: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', '<strong>Groups</strong> Menu')); ?>,
            content: <?php echo json_encode(Yii::t('TourModule.widgets_views_index', 'This is the most important menu and will probably be the one you use most often!<br><br>Access all the groups you have joined and create new groups here.<br><br>The next guide will show you how:')); ?> + "<br><br><a href='javascript:gotoSpace = true; tourCompleted();'><?php echo Yii::t("TourModule.widgets_views_index", "<strong>Start</strong> groups guide"); ?></a><br><br>",
            placement: "bottom"
        }
    ]);

    // Initialize tour plugin
    interfaceTour.init();

    // start the tour
    interfaceTour.restart();




    /**
     * Set tour as seen
     */
    function tourCompleted() {
        // load user spaces
        $.ajax({
            'url': '<?php echo Yii::app()->createAbsoluteUrl('//tour/tour/tourCompleted', array('section' => 'interface')); ?>',
            'cache': false,
            'data': jQuery(this).parents("form").serialize()
        }).done(function() {
            // cross out welcome tour entry
            $('#interface_entry').addClass('completed');

            if (gotoSpace == true) {

                // redirect to space
                window.location.href = "<?php echo Yii::app()->createUrl('//tour/tour/startSpaceTour'); ?>";
            }
        });
    }



</script>