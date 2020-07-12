@if(isset($loadingId) && $loadingId)
    @php($loadingName = "loading".$loadingId)
    <div v-if="<?php echo $loadingName ?>" class="orbit-spinner d-block m-auto">
        <div class="orbit"></div>
        <div class="orbit"></div>
        <div class="orbit"></div>
    </div>
@else
    <div v-if="loading" class="orbit-spinner d-block m-auto">
        <div class="orbit"></div>
        <div class="orbit"></div>
        <div class="orbit"></div>
    </div>
@endif

