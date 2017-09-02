@if (Session::has('info'))
    <div class="primary callout" data-closable >
        {{ Session::get('info') }}
        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (Session::has('success'))
    <div class="success callout" data-closable >
        {{ Session::get('success') }}
        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
@if (Session::has('alert'))
    <div class="alert callout" data-closable >
        {{ Session::get('alert') }}
        <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif