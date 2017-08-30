@if (Session::has('info'))
    <div class="primary callout" data-closable >
        {{ Session::get('info') }}
        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif