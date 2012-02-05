
</div>

<footer>
    <p>&copy;
        <?php
        if($nombre_empresa = $this->session->userdata('nombre_empresa')){
            echo $nombre_empresa;
        }else{
            echo 'Web FrontEnd 2012';
        }
        ?>
    </p>

</footer>

</div> <!-- /container -->

</body>
</html>
