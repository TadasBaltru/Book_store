<div class="well">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h4>Leave rating</h4>
    <form wire:submit.prevent="submitRating"  role="form">

        @csrf



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
        <button type="submit" name="save" class="btn btn-primary">Submit</button>

    </form>
    <p>Your rating was:
        @foreach($rating as $rate)
            {{$rate->rating}}
        @endforeach
    </p>
    @if($average >  0.00)
        <small>Average rating: {{number_format($average, 2 )}}</small>

    @else
        <small>This book havent been rated</small>

    @endif

</div>
