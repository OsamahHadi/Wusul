<div>
    <input type="hidden" name='id' value='' wire:model='orderId' >
    <hr class="my-0">
    <div class="modal-header">
        <h5 class="modal-title fs-5 fw-bolder" id="modalToggleLabel"> تقيييم الخدمه </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" id='starts-close' aria-label="Close"></button>
    </div>
    <div class="card-body">
        <div>
            <h5 class="mb-0 text-center text-warning">
                <div class='div-stars-container' style="position: relative;">
                    @for($i = 0; $i < 4; $i++) 
                    <input type="radio" name="stars" value="{{$i+1}}" onclick="rating()"
                      wire:model='stars' style="position: absolute ;top: 8px; opacity: 0; width: 25px;cursor: pointer;">
                        @if($i < $stars) 
                        <i class="bx bxs-star bx-sm"></i>
                            @else
                            <i class="bx bx-star bx-sm"></i>
                            @endif
                            @endfor
                </div>
            </h5>
        </div>
        <div></div>
    </div>
</div>
