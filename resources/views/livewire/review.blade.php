<div>
@auth
    <div           class="well" style ="margin-top:80px; margin-bottom: 80px" >

        <h4>Leave review:</h4>
        <form wire:submit.prevent="submitComment"  role="form">
            @csrf
            <div class="form-group">
                <label for="comment_content">Your review</label>
                <textarea class="form-control" wire:model="content" class="form-control"  rows="3"></textarea>
            </div>
            <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @endauth
    <div class="card card-outline-secondary my-4">
        <div class="card-header">
            Product Reviews
        </div>
        <div class="card-body">
            @foreach($reviews as $review)
                <p>{{$review->content}}</p>
                <small class="text-muted">Posted by {{$review->user->name}} on {{$review->created_at}}</small>
                <hr>
            @endforeach
        </div>
    </div>

</div>
