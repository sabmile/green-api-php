<div class="response__inner">
    <h2>Ответ:</h2>
    <div class="response__content">
        <?php $arr = json_decode($response); ?>
        <?php echo "<pre>" . json_encode($arr, JSON_PRETTY_PRINT) . "<pre/>" ?>; 
    </div>
</div>