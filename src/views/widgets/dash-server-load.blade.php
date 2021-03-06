<div class="box box-danger" id="loading-example">
    <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-danger btn-sm refresh-btn" data-toggle="tooltip" title="Reload"><i class="fa fa-refresh"></i></button>
            <button class="btn btn-danger btn-sm" data-widget='collapse' data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
            <button class="btn btn-danger btn-sm" data-widget='remove' data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
        <i class="fa fa-cloud"></i>

        <h3 class="box-title">Server Load</h3>
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <div class="row">
            <div class="col-sm-7">
                <!-- bar chart -->
                <div class="chart" id="bar-chart" style="height: 250px;"></div>
            </div>
            <div class="col-sm-5">
                <div class="pad">
                    <!-- Progress bars -->
                    <div class="clearfix">
                        <span class="pull-left">Bandwidth</span>
                        <small class="pull-right">10/200 GB</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                    </div>

                    <div class="clearfix">
                        <span class="pull-left">Transfered</span>
                        <small class="pull-right">10 GB</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 70%;"></div>
                    </div>

                    <div class="clearfix">
                        <span class="pull-left">Activity</span>
                        <small class="pull-right">73%</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-light-blue" style="width: 70%;"></div>
                    </div>

                    <div class="clearfix">
                        <span class="pull-left">FTP</span>
                        <small class="pull-right">30 GB</small>
                    </div>
                    <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 70%;"></div>
                    </div>
                    <!-- Buttons -->
                    <p>
                        <button class="btn btn-default btn-sm"><i class="fa fa-cloud-download"></i> Generate PDF</button>
                    </p>
                </div><!-- /.pad -->
            </div><!-- /.col -->
        </div><!-- /.row - inside box -->
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="row">
            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <input type="text" class="knob" data-readonly="true" value="80" data-width="60" data-height="60" data-fgColor="#f56954"/>
                <div class="knob-label">CPU</div>
            </div><!-- ./col -->
            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#00a65a"/>
                <div class="knob-label">Disk</div>
            </div><!-- ./col -->
            <div class="col-xs-4 text-center">
                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#3c8dbc"/>
                <div class="knob-label">RAM</div>
            </div><!-- ./col -->
        </div><!-- /.row -->
    </div><!-- /.box-footer -->
</div><!-- /.box -->

<!-- Custom tabs (Charts with tabs)-->
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs pull-right">
        <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
        <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
        <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
    </ul>
    <div class="tab-content no-padding">
        <!-- Morris chart - Sales -->
        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
    </div>
</div><!-- /.nav-tabs-custom -->

<!-- Calendar -->
<div class="box box-warning">
    <div class="box-header">
        <i class="fa fa-calendar"></i>
        <div class="box-title">Calendar</div>

        <!-- tools box -->
        <div class="pull-right box-tools">
            <!-- button with a dropdown -->
            <div class="btn-group">
                <button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                </ul>
            </div>
        </div><!-- /. tools -->
    </div><!-- /.box-header -->
    <div class="box-body no-padding">
        <!--The calendar -->
        <div id="calendar"></div>
    </div><!-- /.box-body -->
</div><!-- /.box -->

<!-- quick email widget -->
<div class="box box-info">
    <div class="box-header">
        <i class="fa fa-envelope"></i>
        <h3 class="box-title">Quick Email</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">
        <form action="#" method="post">
            <div class="form-group">
                <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject"/>
            </div>
            <div>
                <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
        </form>
    </div>
    <div class="box-footer clearfix">
        <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
    </div>
</div>