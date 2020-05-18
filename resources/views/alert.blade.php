@php
  $estado = 'Activo';
  $classType = 'info';

  switch($type) {
    case 2: $classType = 'warning'; $estado = 'Prestado'; break;
    case 0: $classType = 'danger'; $estado = 'Dañado'; break;
  }
@endphp
<div class="alert alert-{{ $classType }}" style="text-align: center; margin: 0px;">
  <div class="text-xs text-bold">{{ $estado }}</div>
</div>