@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10" id="ajaxModelexa" aria-hidden="true">
        <div class="w3-panel w3-card card ">
            <div id="white">
                <form method="post" id="docForm" name="docForm" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h4
                        style="font-family: Poppins; font-size: 30px;font-weight: 600;line-height: 32px;letter-spacing: 0px;text-align: left;color: #05004E;  font-weight: bold;">
                        Document Proof</h4><br><br>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="hidden" name="doc_id" id="doc_id">
                            <div class="Neon Neon-theme-dragdropbox">
                                <h4>Upload Your Addhar Card</h4>
                                <input
                                    style="z-index: 999; opacity: 0; width: 320px; height: 200px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;"
                                    name="adhar_card[]" id="filer_input2" multiple="multiple" type="file">
                                <div class="Neon-input-dragDrop">
                                    <div class="Neon-input-inner">
                                        <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                        <div class="Neon-input-text">
                                            <h3>Drag&amp;Drop files here</h3> <span
                                                style="display:inline-block; margin: 15px 0">or</span>
                                        </div>
                                      
                                        <input type="file" name="adhar_card" class="Neon-input-choose-btn blue">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Neon Neon-theme-dragdropbox">
                                <h4>Upload Your Pan Card</h4>
                                <input
                                    style="z-index: 999; opacity: 0; width: 320px; height: 200px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;"
                                    name="pan_card[]" id="filer_input2" multiple="multiple" type="file">
                                <div class="Neon-input-dragDrop">
                                    <div class="Neon-input-inner">
                                        <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                        <div class="Neon-input-text">
                                            <h3>Drag&amp;Drop files here</h3> <span
                                                style="display:inline-block; margin: 15px 0">or</span>
                                        </div>
                                        <input type="file" name="pan_card" class="Neon-input-choose-btn blue">
                                        <!-- <a class="Neon-input-choose-btn blue">Browse Files</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Neon Neon-theme-dragdropbox">
                                <h4>Upload Your Voter Card</h4>
                                <input
                                    style="z-index: 999; opacity: 0; width: 320px; height: 200px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;"
                                    name="voter_card[]" id="filer_input2" multiple="multiple" type="file">
                                <div class="Neon-input-dragDrop">
                                    <div class="Neon-input-inner">
                                        <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                        <div class="Neon-input-text">
                                            <h3>Drag&amp;Drop files here</h3> <span
                                                style="display:inline-block; margin: 15px 0">or</span>
                                        </div>
                                        <input type="file" name="voter_card" class="Neon-input-choose-btn blue">
                                        <!-- <a class="Neon-input-choose-btn blue">Browse Files</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="Neon Neon-theme-dragdropbox">
                                <h4>10 MarkSheet</h4>
                                <input
                                    style="z-index: 999; opacity: 0; width: 320px; height: 200px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;"
                                    name="standard_10_markshhet[]" id="filer_input2" multiple="multiple" type="file">
                                <div class="Neon-input-dragDrop">
                                    <div class="Neon-input-inner">
                                        <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                        <div class="Neon-input-text">
                                            <h3>Drag&amp;Drop files here</h3> <span
                                                style="display:inline-block; margin: 15px 0">or</span>
                                        </div>
                                        <input type="file" name="standard_10_markshhet" class="Neon-input-choose-btn blue">
                                        <!-- <a class="Neon-input-choose-btn blue">Browse Files</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="Neon Neon-theme-dragdropbox">
                                <h4>12 MarkSheet</h4>
                                <input
                                    style="z-index: 999; opacity: 0; width: 320px; height: 200px; position: absolute; right: 0px; left: 0px; margin-right: auto; margin-left: auto;"
                                    name="standard_12_markshhet[]" id="filer_input2" multiple="multiple" type="file">
                                <div class="Neon-input-dragDrop">
                                    <div class="Neon-input-inner">
                                        <div class="Neon-input-icon"><i class="fa fa-file-image-o"></i></div>
                                        <div class="Neon-input-text">
                                            <h3>Drag&amp;Drop files here</h3> <span
                                                style="display:inline-block; margin: 15px 0">or</span>
                                        </div>
                                        <input type="file" name="standard_12_markshhet" class="Neon-input-choose-btn blue">
                                        <!-- <a class="Neon-input-choose-btn blue">Browse Files</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button type="submit" id="savedata" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn bg-gradient-secondary"><a href="{{ route('documents') }}">Cancel </a></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
{!! Toastr::message() !!}
