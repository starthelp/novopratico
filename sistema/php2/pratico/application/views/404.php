<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('header');
?>
<!-- page content -->
<div class="col-md-12">
  <div class="col-middle">
    <div class="text-center text-center">
      <h1 class="error-number">404</h1>
      <h2>Página não encontrada</h2>
      <p>Desculpe, mas a página que você digitou não existe <a href="#">Reportar Erro?</a>
      </p>
      <div class="mid_center">
        <h3>Search</h3>
        <form>
          <div class="col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <a class="btn btn-default" href="<?php echo base_url('index'); ?>" title="Voltar para a página inicial" type="button">Ir!</a>
              </span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('footer');
?>
