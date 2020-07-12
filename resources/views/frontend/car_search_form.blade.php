<div class="car__sidebar">
    <div class="car__filter">
        <h5>Use Elastic Search</h5>
        <form action="{{ route('frontend.cars.index') }}">
            <input type="text" class="form-control" value="{{ $searchForm['make'] }}" placeholder="Make" name="make">
            <br/>
            <input type="text" class="form-control" value="{{ $searchForm['model'] }}" placeholder="Model" name="model"><br/>
            <input type="number" class="form-control" value="{{ $searchForm['engine_size'] }}" placeholder="Engine Size" name="engine_size"><br/>
            <div class="car__filter__btn">
                <button type="submit" class="site-btn">Search</button>
            </div>
        </form>
    </div>
</div>