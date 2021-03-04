<div>
@auth
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            @if($average >  0.00)
                <small>Average rating: &#9733;{{number_format($average, 2 )}}</small>

            @else
                <small>This book havent been rated</small>

            @endif
    <div           class="well" style ="margin-top:80px; margin-bottom: 80px" >

        <h4>Leave review:</h4>
        <form wire:submit.prevent="submitComment"  role="form">
            @csrf

            <input  type="text" wire:model="user_id" value="{{auth()->user()->id}}" hidden  >

            Select rating from 1 to 5:
            <br>
            <br>
            <select wire:model="rate" id="" class="form-control">

                <option value="">Select rating</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>



            </select>
            <br>
            <br>


            <div class="form-group">
                @error('content') <span class="error">{{ $message }}</span> @enderror
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
                <small class="text-muted">{{$review->user->name}} on {{$review->created_at}} 	&#9733; {{$review->rating}}</small>
                <hr>
            @endforeach
        </div>
    </div>

</div>
