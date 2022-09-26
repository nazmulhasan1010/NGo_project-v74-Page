<div class="row content-80 theme border-bottom-">
    <div class="col-md-12 mb-5 theme-changer">
        <input type="radio" name="theme" value="dark" id="dark">
        <label for="dark" class="col-form-label">Dark</label>

        <input type="radio" name="theme" value="light" id="light">
        <label for="light" class="col-form-label">Light</label>
    </div>
</div>

@push('onPage-js')
    <script src="{{asset('assets/frontend/javascript/themeChanger.js')}}" >    </script>
@endpush
