  <?php
    if ($resultadosFiltro) {
        foreach ($resultadosFiltro as $propiedad) { ?>
          <a href="/propiedad?id=<?php echo $propiedad->id_propiedad; ?>" class="propiedad">
              <div class="propiedad_img">
                  <picture>
                      <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $propiedad->img1; ?>" alt="<?php echo $propiedad->img1; ?>" width="600" height="400">
                  </picture>
              </div>

              <div class="propiedad_informacion">
                  <div class="cabecera_info contenedor">
                      <div class="titulo_barra">
                          <hr>
                          <h3 id="tipoPropiedad"><?php echo $propiedad->tipo_propiedad_nombre; ?></h3>
                      </div>
                      <p id="idPropiedad"><?php echo "ALP" . $propiedad->id_propiedad; ?></p>
                  </div>
                  <div class="info_ubic">
                      <div class="info_orga">
                          <div class="ubicacion">
                              <h4><?php echo $propiedad->estado . ", " . $propiedad->municipio . ", " . $propiedad->localidad; ?></h4>
                              <p><?php echo $propiedad->colonia . ', ' . $propiedad->calle; ?></p>
                          </div>
                      </div>
                      <div class="finalidad">
                          <div class="precio">
                              <h4><span><?php echo '$ ' . number_format($propiedad->precio); ?></span></h4>
                          </div>
                          <div class="">
                              <?php echo $propiedad->finalidad_nombre; ?>
                          </div>
                      </div>
                  </div>
                  <div class="contenedor">
                      <hr>
                      <div class="cuerpo_info">
                          <?php if (isset($propiedad->habitaciones) && $propiedad->habitaciones !== '') {  ?>
                              <p id='m2'> <span><?php echo $propiedad->habitaciones ?></span> Habitaciones</p>
                          <?php } else {
                                echo '';
                            } ?>

                          <?php if (isset($propiedad->estacionamientos) && $propiedad->estacionamientos !== '') {  ?>
                              <p id='m2'> <span><?php echo $propiedad->estacionamientos; ?></span> Aparcamiento</p>
                          <?php } else {
                                echo '';
                            } ?>

                          <?php if (isset($propiedad->wc) && $propiedad->wc !== '') {  ?>
                              <p id='m2'> <span><?php echo $propiedad->wc; ?></span> Baños</p>
                          <?php } else {
                                echo '';
                            } ?>

                          <?php if (isset($propiedad->metros_cuadrados) && $propiedad->metros_cuadrados !== '') {  ?>
                              <p id='m2'> <span><?php echo $propiedad->metros_cuadrados; ?></span> Metros²</p>
                          <?php } else {
                                echo '';
                            } ?>
                      </div>

                  </div>
              </div>
          </a>
      <?php }
    } else { ?>
      <a href="/propiedad?id=<?php echo $propiedad->id; ?>" class="propiedad">
          <div class="propiedad_img">
              <picture>
                  <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $propiedad->img1; ?>" alt="<?php echo $propiedad->img1; ?>" width="600" height="400">
              </picture>
          </div>

          <div class="propiedad_informacion">
              <div class="cabecera_info contenedor">
                  <div class="titulo_barra">
                      <hr>
                      <h3 id="tipoPropiedad"><?php echo $propiedad->tipo_propiedad_nombre; ?></h3>
                  </div>
                  <p id="idPropiedad"><?php echo "ALP" . $propiedad->propiedad_id; ?></p>
              </div>
              <div class="info_ubic">
                  <div class="info_orga">
                      <div class="ubicacion">
                          <h4><?php echo $propiedad->estado . ", " . $propiedad->municipio . ", " . $propiedad->localidad; ?></h4>
                          <p><?php echo $propiedad->colonia . ', ' . $propiedad->calle; ?></p>
                      </div>
                  </div>
                  <div class="finalidad">
                      <div class="precio">
                          <h4><span><?php echo '$ ' . number_format($propiedad->precio); ?></span></h4>
                      </div>
                      <div class="">
                          <?php echo $propiedad->finalidad_nombre; ?>
                      </div>
                  </div>
              </div>
              <div class="contenedor">
                  <hr>
                  <div class="cuerpo_info">
                      <?php if (isset($propiedad->habitaciones) && $propiedad->habitaciones !== '') {  ?>
                          <p id='m2'> <span><?php echo $propiedad->habitaciones ?></span> Habitaciones</p>
                      <?php } else {
                            echo '';
                        } ?>

                      <?php if (isset($propiedad->estacionamientos) && $propiedad->estacionamientos !== '') {  ?>
                          <p id='m2'> <span><?php echo $propiedad->estacionamientos; ?></span> Aparcamiento</p>
                      <?php } else {
                            echo '';
                        } ?>

                      <?php if (isset($propiedad->wc) && $propiedad->wc !== '') {  ?>
                          <p id='m2'> <span><?php echo $propiedad->wc; ?></span> Baños</p>
                      <?php } else {
                            echo '';
                        } ?>

                      <?php if (isset($propiedad->metros_cuadrados) && $propiedad->metros_cuadrados !== '') {  ?>
                          <p id='m2'> <span><?php echo $propiedad->metros_cuadrados; ?></span> Metros²</p>
                      <?php } else {
                            echo '';
                        } ?>
                  </div>

              </div>
          </div>
      </a>
  <?php } ?>