<?php ?>

<section class="add-services _modal-add">
    <div class="modal_header">
        <i class="icon icon-close"></i>
        <span>Add service</span>
    </div>
    <div class="modal_content">
        <form action="{{route('company.create')}}" method="post">
            @csrf
            <div class="service-name">
                <label for="addService">
                    <span>Service name</span>
                    <input id="addService" type="text">
                </label>
            </div>
            <div class="service-price">
                <label for="servicePrice">
                    <span>Price</span>
                    <input id="servicePrice" type="text">
                </label>
            </div>

        </form>

    </div>



</section>

