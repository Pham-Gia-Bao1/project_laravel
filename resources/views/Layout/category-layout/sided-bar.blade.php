

<form action="">
    <ul class="parent-list">
        <li class="child-item">
            <button type="submit" name="box" value="all">All</button>
        </li>
        @foreach($categories as $category)
            <li class="child-item">
                <button type="submit" name="box" value="{{$category->name}}">{{$category->name}}</button>
            </li>
        @endforeach
        <div class="child-item1">
            <div class="form__tags ">
                <input hidden  type="radio" name="size" id="small" value="Small" class="form__tag">
                <label for="small" class="form__tag">Small</label>

                <input hidden  type="radio" name="size" id="medium" value="Medium" class="form__tag">
                <label for="medium" class="form__tag">Medium</label>

                <input hidden  type="radio" name="size" id="large" value="Large" class="form__tag">
                <label for="large" class="form__tag">Large</label>
            </div>
        </div>
    </ul>
</form>
