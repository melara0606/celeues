<div class="modal-header">
  <h3 class="modal-title" id="modal-title">Seleccionar personal</h3>
</div>
<div class="modal-body" id="modal-body">
  <div class="panel">
    <form class="form-horizontal bv-form" name="frm">
      <div class="panel-body">
        <fieldset ng-hide='loading || inValid || isServer'>
          <div class="input-group mar-btm">
            <input type="text" name="dui" required class="form-control" mask='999999999-9'
              placeholder="Digite el dui del personal" ng-model='dui' />
            <span class="input-group-btn">
              <button ng-disabled="frm.dui.$invalid" ng-click='search();' class="btn btn-mint" type="button">Buscar</button>
            </span>
          </div>
        </fieldset>

        <fieldset ng-show='loading'>
          <img src="{{ asset('image-gif.gif') }}" alt="gif" width="300" style="display: block; margin: 0 auto;">
        </fieldset>

        <fieldset style="border: 1px solid" ng-if='isServer'>
          <div class="panel pos-rel">
            <div class="pad-all text-center">
              <img alt="Profile Picture" class="img-lg img-circle mar-ver" src='{{ asset("portfolio-02.jpg") }}'>
              <p class="text-lg text-semibold mar-no text-main">
               [{n}] [{a}]
              </p>
              <p class="text-sm">DUI: [{dui}]</p>
            </div>
          </div>
        </fieldset>

        <fieldset ng-show='inValid'>
          <div class="form-group has-success">
            <label class="col-lg-3 control-label" for="nombres">DUI: </label>
            <div class="col-lg-7">
              <h4>[{ dui }]</h4>
            </div>
          </div>
          <div class="form-group has-error" ng-class="{ 'has-success': frm.nombres.$valid }">
            <label class="col-lg-3 control-label" for="nombres">Nombres: </label>
            <div class="col-lg-7">
              <input type="text" ng-minlength='5' required class="form-control" name="nombres" id="nombres" ng-model='n' />
            </div>
          </div>
          <div class="form-group has-error" ng-class="{ 'has-success': frm.apellidos.$valid }">
            <label class="col-lg-3 control-label" for="apellidos">Apellidos: </label>
            <div class="col-lg-7">
              <input type="text" ng-minlength='5' required name="apellidos" ng-model='a' id="apellidos" class="form-control">
            </div>
          </div>
        </fieldset>
      </div>
    </form>
  </div>
</div>
<div class="modal-footer">
  <button class="btn btn-primary" type="button" ng-click="ok()" ng-disabled='frm.$invalid' >OK</button>
  <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
</div>