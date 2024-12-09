<div class="d-flex">

    <a class="btn btn-info me-2"
        href="{{ route('admin.schedules.detailShip', [
            'ship_id' => $ship_id,
            'type' => $type,
            'month' => \Carbon\Carbon::parse($time)->month,
            'year' => \Carbon\Carbon::parse($time)->year,
        ]) }}">
        <i class="bx bx-show me-1"></i> Detail
    </a>
</div>
