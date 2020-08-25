@if(app('request')->get('message')  )     {{-- isset($_GET['message'])) --}}
    <?php $message=htmlspecialchars(app('request')->get('message'));?>        {{-- $_GET['message']); ?> --}}
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success!</strong> {{$message}}
    </div>
@endif

@if(isset($searchMessage) AND (app('request')->get('countAppearance') == 1))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Your search results: </strong> {{$searchMessage}}
    </div>
@endif

@if( isset($cannotBeDeleted) AND $cannotBeDeleted !== 'do not show' )
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Info!</strong> {{$cannotBeDeleted}}
    </div>
@endif

@if(isset($cannotCreateGenre))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Can't create genre!</strong> {{$cannotCreateGenre}}
    </div>
@endif

@if(isset($searchQueryException) AND (app('request')->get('countAppearance') == 1))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Even didn't try to search ... !</strong> {{$searchQueryException}}
    </div>
@endif




