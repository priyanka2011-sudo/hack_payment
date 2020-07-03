<?php include "header.php";?>
    <div class="container">
      <br>
      <h3> Initiation - Checkout </h3>
      <br><br>
  <div class="row">

    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"> number of items</span>
      </h4>
      <div class="centre">
      <ul class="list-group mb-3">
       
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Second product</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$</span>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Third item</h6>
            <small class="text-muted">Brief description</small>
          </div>
          <span class="text-muted">$</span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small> </small>
          </div>
          <span class="text-success">$</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (CAD)</span>
          <strong>$</strong>
        </li>
      </ul>
      <form class="card p-2">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>

<div class="next">
  <button type="button" class="btn btn-success">Checkout</button>
</div>
<br>

<a href="initiation1.html">
<div class="shop">
<button type="button" class="btn btn-warning">Continue Shopping</button>
</div></a>
<br>
<?php include "footer.php";?>