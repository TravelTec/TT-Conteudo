<?php  

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function categories_list_w4travel($atts){
        
        $retorno = "";

        /* CONTAINER */
        $retorno .= '<div class="container">';
            /* ROW */
            $retorno .= '<div class="row">';
                /* COL */
                $retorno .= '<div class="form_cotacao col-12 col-lg-8">';

                    $retorno .= '<p>Precisa de uma cotação personalizada? <br>';
                    $retorno .= 'É só preencher o formulário abaixo:</p>';

                        $retorno .= '<div class="form-group">';
                            $retorno .= '<strong><label for="inputNome">Nome completo: <span style="color:red;font-size: 12px;">*</span></label></strong>';
                            $retorno .= '<input type="text" class="form-control" id="inputNome" aria-describedby="inputNome" placeholder="Digite seu nome completo" autocomplete="off">'; 
                        $retorno .= '</div>';

                        $retorno .= '<div class="form-group">';
                            $retorno .= '<strong><label for="inputEmail">E-mail: <span style="color:red;font-size: 12px;">*</span></label></strong>';
                            $retorno .= '<input type="text" class="form-control" id="inputEmail" aria-describedby="inputEmail" placeholder="Digite seu e-mail" autocomplete="off">'; 
                        $retorno .= '</div>';

                        $retorno .= '<div class="form-group">';
                            $retorno .= '<strong><label for="inputPhone">Celular: <span style="color:red;font-size: 12px;">*</span></label></strong>';
                            $retorno .= '<input type="text" class="form-control" id="inputPhone" aria-describedby="inputPhone" placeholder="Digite seu telefone/celular" autocomplete="off">'; 
                        $retorno .= '</div>';

                        $retorno .= '<div class="form-group">';
                            $retorno .= '<strong><label for="inputFrom">Origem: <span style="color:red;font-size: 12px;">*</span></label></strong>';
                            $retorno .= '<input type="text" class="form-control" id="inputFrom" aria-describedby="inputFrom" placeholder="Digite sua cidade de origem" autocomplete="off">'; 
                        $retorno .= '</div>';

                        $retorno .= '<div class="form-group">';
                            $retorno .= '<strong><label for="inputTo">Destino: <span style="color:red;font-size: 12px;">*</span></label></strong>';
                            $retorno .= '<input type="text" class="form-control" id="inputTo" aria-describedby="inputTo" placeholder="Digite sua cidade de destino" autocomplete="off" value="'.(!empty($_GET['pagina']) ? $_GET['pagina'] : '').'">'; 
                        $retorno .= '</div>';

                        /* ROW */
                        $retorno .= '<div class="row">';
                            /* COL */
                            $retorno .= '<div class="col-6">';
                                $retorno .= '<div class="form-group">';
                                    $retorno .= '<strong><label for="inputDateFrom">Partida: <span style="color:red;font-size: 12px;">*</span></label></strong>';
                                    $retorno .= '<input type="text" class="form-control" id="inputDateFrom" aria-describedby="inputDateFrom" placeholder="Selecione a data de partida" autocomplete="off">'; 
                                $retorno .= '</div>';
                            $retorno .= '</div>';
                            /* FIM COL */
                            /* COL */
                            $retorno .= '<div class="col-6">';
                                $retorno .= '<div class="form-group">';
                                    $retorno .= '<strong><label for="inputDateTo">Retorno: <span style="color:red;font-size: 12px;">*</span></label></strong>';
                                    $retorno .= '<input type="text" class="form-control" id="inputDateTo" aria-describedby="inputDateTo" placeholder="Selecione a data de retorno" autocomplete="off">'; 
                                $retorno .= '</div>';
                            $retorno .= '</div>';
                            /* FIM COL */
                        $retorno .= '</div>';
                        /* FIM ROW */

                        /* ROW */
                        $retorno .= '<div class="row">';
                            /* COL */
                            $retorno .= '<div class="col-6">';
                                $retorno .= '<div class="form-group">';
                                    $retorno .= '<strong><label for="inputAdults">Adultos: <span style="color:red;font-size: 12px;">*</span></label></strong>';
                                    $retorno .= '<select id="inputAdults" aria-describedby="inputAdults" class="form-control">';
                                        $retorno .= '<option value="">Selecione a quantidade de adultos...</option>';
                                        $retorno .= '<option value="1 adulto">1 adulto</option>';
                                        $retorno .= '<option value="2 adultos">2 adultos</option>';
                                        $retorno .= '<option value="3 adultos">3 adultos</option>';
                                        $retorno .= '<option value="4 adultos">4 adultos</option>';
                                        $retorno .= '<option value="5 adultos">5 adultos</option>';
                                        $retorno .= '<option value="6 adultos">6 adultos</option>';
                                        $retorno .= '<option value="7 adultos">7 adultos</option>';
                                        $retorno .= '<option value="8 adultos">8 adultos</option>';
                                        $retorno .= '<option value="9 adultos">9 adultos</option>';
                                    $retorno .= '</select>'; 
                                $retorno .= '</div>';
                            $retorno .= '</div>';
                            /* FIM COL */
                            /* COL */
                            $retorno .= '<div class="col-6">';
                                $retorno .= '<div class="form-group">';
                                    $retorno .= '<strong><label for="inputChildren">Crianças: <span style="color:red;font-size: 12px;">*</span></label></strong>';
                                    $retorno .= '<select id="inputChildren" aria-describedby="inputChildren" class="form-control">';
                                        $retorno .= '<option value="">Selecione a quantidade de crianças...</option>';
                                        $retorno .= '<option value="Sem crianças">Sem crianças</option>';
                                        $retorno .= '<option value="1 criança">1 criança</option>';
                                        $retorno .= '<option value="2 crianças">2 crianças</option>';
                                        $retorno .= '<option value="3 crianças">3 crianças</option>';
                                        $retorno .= '<option value="4 crianças">4 crianças</option>';
                                        $retorno .= '<option value="5 crianças">5 crianças</option>';
                                        $retorno .= '<option value="6 crianças">6 crianças</option>';
                                        $retorno .= '<option value="7 crianças">7 crianças</option>';
                                        $retorno .= '<option value="8 crianças">8 crianças</option>';
                                        $retorno .= '<option value="9 crianças">9 crianças</option>';
                                    $retorno .= '</select>'; 
                                $retorno .= '</div>';
                            $retorno .= '</div>';
                            /* FIM COL */
                        $retorno .= '</div>';
                        /* FIM ROW */

                        $retorno .= '<div class="form-group">';
                            $retorno .= '<strong><label>Serviços adicionais: <span style="color:red;font-size: 12px;">*</span></label></strong> <br>';
                            $retorno .= '<div class="form-check form-check-inline">';
                                $retorno .= '<input class="form-check-input" type="checkbox" id="inlinePlane" value="Passagens Aéreas">';
                                $retorno .= '<label class="form-check-label" for="inlinePlane">Passagens Aéreas</label>';
                            $retorno .= '</div>';

                            $retorno .= '<div class="form-check form-check-inline">';
                                $retorno .= '<input class="form-check-input" type="checkbox" id="inlineHotel" value="Hospedagem">';
                                $retorno .= '<label class="form-check-label" for="inlineHotel">Hospedagem</label>';
                            $retorno .= '</div>';

                            $retorno .= '<div class="form-check form-check-inline">';
                                $retorno .= '<input class="form-check-input" type="checkbox" id="inlineCar" value="Locação de Veículos">';
                                $retorno .= '<label class="form-check-label" for="inlineCar">Locação de Veículos</label>';
                            $retorno .= '</div>';

                            $retorno .= '<div class="form-check form-check-inline">';
                                $retorno .= '<input class="form-check-input" type="checkbox" id="inlineInsurance" value="Seguro Viagem">';
                                $retorno .= '<label class="form-check-label" for="inlineInsurance">Seguro Viagem</label>';
                            $retorno .= '</div>';

                            $retorno .= '<div class="form-check form-check-inline">';
                                $retorno .= '<input class="form-check-input" type="checkbox" id="inlineTickets" value="Ingressos">';
                                $retorno .= '<label class="form-check-label" for="inlineTickets">Ingressos</label>';
                            $retorno .= '</div>';
                        $retorno .= '</div>';


                        $retorno .= '<div class="form-group">';
                            $retorno .= '<strong><label for="inputMessage">Mensagem:</strong>';
                            $retorno .= '<textarea class="form-control" id="inputMessage" rows="4" placeholder="Deixe sua mensagem caso precise de algum serviço adicional ou outras disponibilidades.">'; 
                            $retorno .= '</textarea>'; 
                        $retorno .= '</div>';

                        $retorno .= '<div class="form-group">'; 
                            $retorno .= '<button id="button_send_mail" class="btn btn-primary" onclick="send_form_cotacao()">Enviar solicitação</button>'; 
                        $retorno .= '</div>';  

                    /* FIM FORM */
                $retorno .= '</div>';
                /* FIM COL */
            $retorno .= '</div>';
            /* FIM ROW */
        $retorno .= '</div>';
        /* FIM CONTAINER */

        return $retorno;
    }

    add_shortcode('VOUCHERTEC_FORMULARIO_COTACAO', 'categories_list_w4travel');

?>