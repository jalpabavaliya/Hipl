@include('layouts.header')
@include('layouts.headerSub')
<div class="row bg-light vh-100">
    @include('layouts.sidebar')
    <div class="col-xxl-10">
        <div class="w3-panel w3-card card ">
            <div id="white">
                <form action="{{ route('leave_policy.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="policy_id" id="policy_id"> --}}
                    <div class="form-group lang_form" id="form">
                        <textarea name="detail" class="form-control ckeditor" cols="100" rows="20">
                            @if (!empty($policy))
                                {{ $policy->detail }}
                            @endif
                        </textarea>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary px-5" type="submit">Save</button>
                        <button class="btn btn-secondary text-dark ms-2 px-5" type="button">Cancel</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
{!! Toastr::message() !!}

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
        alignment: {
            options: ['left', 'right']
        },
    });

    // loadThreadsFromServer: function loadThreadsFromServer() {
    //     $.ajax({
    //         url: this.props.url,
    //         dataType: 'json',
    //         cache: false,
    //         success: function(data) {
    //             this.setState({
    //                 data: data,
    //                 async: true,
    //                 cache: false,
    //             });
    //         }.bind(this),
    //         error: function(xhr, status, err) {
    //             console.error(this.props.url, status, err.toString());
    //         }.bind(this)
    //     });
    // },

    // fetch(`https://api.github.com/users/${login}`)
    // .then(response => response.json())
    // .then(setData)
    // .catch(error => (console.log(error)));
</script>
