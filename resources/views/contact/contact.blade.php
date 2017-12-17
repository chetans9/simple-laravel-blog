@extends('layouts.template')

@section('content')
    <div class="contact">
        <div class="container">
            @include('includes.alerts')
            <div class="contact-text">
                <div class="col-md-4 contact-left">
                    <h4>Sed dapibus nunc eu metus commodo, et dictum justo fermentum.</h4>
                    <p>Aliquam quis lacus at sapien tempor semper. Sed ultrices et metus et elementum. Nunc sed justo at
                        erat
                        consequat mollis et eu lectus.</p>
                    <div class="address">
                        <h4>Address</h4>
                        <p>The company name,
                            <span>Lorem ipsum dolor,</span>
                            Glasglow Dr 40 Fe 72.</p>
                    </div>
                </div>
                <div class="col-md-8 contact-right">
                    {{Form::open(["url"=>url('contact'),'method'=>'POST'])}}
                    {{Form::text('name',null,["required"=>"required","placeholder"=>"Name"])}}
                    {{Form::email('email',null,["required"=>"required","placeholder"=>"Email"])}}
                    {{Form::textarea('message',null,["required"=>"required","placeholder"=>"Message"])}}
                    <div class="submit-btn">
                            <input type="submit" value="SUBMIT">
                    </div>
                    {{Form::close()}}
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection