{% extends "admin/layout.twig" %}
{% block title %} الفوتر {% endblock %}

{% block content %}

<!-- Main content -->
<div class="content-wrapper">

<!-- Page header -->
<div class="page-header page-header-transparent">
    <div class="page-header-content">
        <div class="page-title">
            <h1> <span class="text-semibold">{{l.footet_home_page_settings.0}}</span></h1>
        </div>

        
    </div>
</div>
<!-- /page header -->

<!-- Content area -->
<div class="content">
		{% include "admin/elements/flash.twig" %}



<form class="form-horizontal" method="post" action="{{path_for('settings.footer')}}" enctype='multipart/form-data'>
	{!! csrf_field() !!}

        <div class="panel panel-flat">
            <div class="panel-heading no-padding-bottom">
                <h3 class="panel-title">{{l.footet_home_page_settings.14}}</h3>
            </div>
            <hr>
            <div class="panel-body">
                <fieldset class="content-group">
                <div class="col-md-3">
                    <div class="form-group">
						<label class="control-label col-lg-12">{{l.footet_home_page_settings.13}}</label>
						<div class="col-lg-12">
							<input type="text" class="form-control"  value="{{ 'footer_text_widget_title_1'|options }}" name="footer_text_widget_title_1" placeholder="">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-lg-12">{{l.footet_home_page_settings.14}}</label>
						<div class="col-lg-12">
							<textarea name="footer_text_widget_content_1" class="form-control" rows="4">{{ 'footer_text_widget_content_1'|options }}</textarea>
						</div>
					</div>	
                </div>
                <div class="col-md-3">
                    <div class="form-group">
						<label class="control-label col-lg-12">{{l.footet_home_page_settings.13}}</label>
						<div class="col-lg-12">
							<input type="text" class="form-control"  value="{{ 'footer_text_widget_title_2'|options }}" name="footer_text_widget_title_2" placeholder="">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-lg-12">{{l.footet_home_page_settings.14}}</label>
						<div class="col-lg-12">
							<textarea name="footer_text_widget_content_2" class="form-control" rows="4">{{ 'footer_text_widget_content_2'|options }}</textarea>
						</div>
					</div>	
                </div>
                <div class="col-md-3">
                    <div class="form-group">
						<label class="control-label col-lg-12">{{l.footet_home_page_settings.13}}</label>
						<div class="col-lg-12">
						
							<input type="text" class="form-control"  value="{{ 'footer_text_widget_title_3'|options }}" name="footer_text_widget_title_3" placeholder="">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-lg-12">{{l.footet_home_page_settings.14}}</label>
						<div class="col-lg-12">
							<textarea name="footer_text_widget_content_3" class="form-control" rows="4">{{ 'footer_text_widget_content_3'|options }}</textarea>
						</div>
					</div>	
                </div>
                <div class="col-md-3">
                    <div class="form-group">
						<label class="control-label col-lg-12">{{l.footet_home_page_settings.13}}</label>
						<div class="col-lg-12">
							<input type="text" class="form-control"  value="{{ 'footer_text_widget_title_4'|options }}" name="footer_text_widget_title_4" placeholder="">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-lg-12">{{l.footet_home_page_settings.14}}</label>
						<div class="col-lg-12">
							<textarea name="footer_text_widget_content_4" class="form-control" rows="4">{{ 'footer_text_widget_content_4'|options }}</textarea>
						</div>
					</div>	
                </div>
                <div class="col-md-3">
                    <div class="form-group">
						<label class="control-label col-lg-12">{{l.footet_home_page_settings.13}}</label>
						<div class="col-lg-12">
							<input type="text" class="form-control"  value="{{ 'footer_text_widget_title_5'|options }}" name="footer_text_widget_title_5" placeholder="">
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-lg-12">{{l.footet_home_page_settings.14}}</label>
						<div class="col-lg-12">
							<textarea name="footer_text_widget_content_5" class="form-control" rows="4">{{ 'footer_text_widget_content_5'|options }}</textarea>
						</div>
					</div>	
                </div>
                </fieldset>
            </div>
        </div>
<div class="panel panel-flat">
            <div class="panel-heading no-padding-bottom">
                <h3 class="panel-title">{{l.footet_home_page_settings.187}}</h3>
            </div>
            <hr>
            <div class="panel-body">
                <fieldset class="content-group">
                
                    <div class="form-group">
						<label class="control-label col-lg-2">{{l.footet_home_page_settings.191}}</label>
						<div class="col-lg-10">
							<input type="text" class="form-control"  value="{{ 'footer_link_fb'|options }}" name="footer_link_fb" />
						</div>
					</div>	
                    <div class="form-group">
						<label class="control-label col-lg-2">{{l.footet_home_page_settings.192}}</label>
						<div class="col-lg-10">
							<input type="text" class="form-control"  value="{{ 'footer_link_tw'|options }}" name="footer_link_tw" />
						</div>
					</div>	
                    <div class="form-group">
						<label class="control-label col-lg-2">{{l.footet_home_page_settings.194}}</label>
						<div class="col-lg-10">
							<input type="text" class="form-control"  value="{{ 'footer_link_yb'|options }}" name="footer_link_yb" />
						</div>
					</div>	
                    <div class="form-group">
						<label class="control-label col-lg-2">{{l.footet_home_page_settings.197}}</label>
						<div class="col-lg-10">
							<input type="text" class="form-control"  value="{{ 'footer_link_pi'|options }}" name="footer_link_pi" />
						</div>
					</div>	
                    <div class="form-group">
						<label class="control-label col-lg-2">{{l.footet_home_page_settings.193}}</label>
						<div class="col-lg-10">
							<input type="text" class="form-control"  value="{{ 'footer_link_ins'|options }}" name="footer_link_ins" />
						</div>
					</div>	
                    <div class="form-group">
						<label class="control-label col-lg-2">{{l.footet_home_page_settings.196}}</label>
						<div class="col-lg-10">
							<input type="text" class="form-control"  value="{{ 'footer_link_vie'|options }}" name="footer_link_vie" />
						</div>
					</div>	 
                    <div class="form-group">
						<label class="control-label col-lg-2">{{l.footet_home_page_settings.195}}</label>
						<div class="col-lg-10">
							<input type="text" class="form-control"  value="{{ 'footer_link_gp'|options }}" name="footer_link_gp" />
						</div>
					</div>	                                                            
                </fieldset>
            </div>
        </div>
    <div class="panel panel-flat">
            <div class="panel-heading no-padding-bottom">
                <h3 class="panel-title">{{l.footet_home_page_settings.1}}</h3>
            </div>
            <hr>
            <div class="panel-body">
                <fieldset class="content-group">
                
                    <div class="form-group">
						<label class="control-label col-lg-2">{{l.footet_home_page_settings.2}}</label>
						<div class="col-lg-10">
							<input type="text" class="form-control"  value="{{ 'footer_copyrights'|options }}" name="footer_copyrights" />
						</div>
					</div>		                                                            
                </fieldset>
            </div>
        </div>
    <div class="row">
    <div class="col-md-12">
    <button type="submit" class="btn btn-block btn-primary">{{l.footet_home_page_settings.3}} <i class="icon-arrow-left13 position-right"></i></button>
</div>
    </div>
</form>

</div>


</div>



{% endblock %}	