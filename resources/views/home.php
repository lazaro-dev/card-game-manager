
<div>
    <?php if($nomes): 
        foreach ($nomes as $nome):
        ?>
            <h2><?= $nome; ?></h2>
        <?php
        endforeach;
    else:
    ?>
        <h2>Sem dados</h2>
    <?php
    endif; ?>
</div>