<?php


igk_html_reg_component_package("BMC");

function igk_html_node_BMCTextfield($id,$type="text", $v="", $text=null, $required=0, $autocompleteoff=0){
	//inspiration in google material
	// <div class="mdc-text-field mdc-text-field--box password">
	// <label class="mdc-floating-label" for="pwd">password</label>
	// <input type="password" class="mdc-text-field__input" id="login" name="pwd" required />
	// <div class="mdc-line-ripple"></div>
	// </div>
	$n = igk_createNode("div");
	$n["class"]="igk-winui-bmc-textfield ".$type;
	$i = $n->addInput($id, $type, $v)->setAttributes([
		"class"=>"igk-winui-bmc-field__input"
	]);
	if ($autocompleteoff){
		$i["autocomplete"] = $type=="password"? "current-password" : "off";
	}
	
	$n->add("label")->setAttributes(
		["class"=>"igk-winui-bmc-floating-label", "for"=>$id]
	)->Content=$text ?? R::gets("lb.".$id);
	
	
	$n->addDiv()->setClass("igk-line-ripple");	
	
	return $n;
}

///<summary>represent BMC shape component</summary>
function igk_html_node_BMCShape(){
	$n = igk_createNode("div");
	$n["class"] = "igk-winui-bmc-shape";
	$x = $n->addNoTagNode();
	$x->setIndex(1000);	
	$x->addDiv()->setClass("igk-winui-bmc-shape__corner igk-winui-bmc-shape__corner_tl");
	$x->addDiv()->setClass("igk-winui-bmc-shape__corner igk-winui-bmc-shape__corner_bl");
	$x->addDiv()->setClass("igk-winui-bmc-shape__corner igk-winui-bmc-shape__corner_tr");
	$x->addDiv()->setClass("igk-winui-bmc-shape__corner igk-winui-bmc-shape__corner_br");
	return $n;
}

function igk_html_node_BMCButton(){
	$n = igk_createNode("button", null, func_get_args());
	$n["class"] = "igk-winui-bmc-button";
	//$x = $n->addNoTagNode();
	return $n;
}

function igk_html_node_BMCRipple(){
	$n = igk_createNode("div");
	$n["class"] = "igk-winui-bmc-ripple";
	return $n;
}

function igk_html_node_BMCRadio($id, $value=null){
	$n = igk_createNode("div");
	$n["class"] = "igk-winui-bmc-radio";
	$n->Item = $n->addInput($id, "radio", $value);
	$n->addDiv()->setClass("radio__ripple");
	$n->addDiv()->setClass("radio__select");
	$n->addDiv()->setClass("radio__outline");	
	return $n;	
}

function igk_html_node_BMCCheckbox($id, $value=null, $array=0){
	$n = igk_createNode("div");
	$n["class"] = "igk-winui-bmc-checkbox";
	$i = $n->addInput($id, "checkbox", $value);
	if ($array){
		$i["name"]=$id."[]";
	}
	$n->Item = $i;
	$n->addDiv()->setClass("checkbox__ripple");
	$n->addDiv()->setClass("checkbox__select");
	$n->addDiv()->setClass("checkbox__outline");	
	return $n;	
}


function igk_html_node_BMCSurface(){
	$n = igk_createNode("div");
	$n["class"] = "igk-winui-bmc-surface";
	
	// $n->addBalafonJS()->Content = <<<EOF
// \$igk(this.parentNode).on('mouseover', function(){
	// \$igk('svg animate#normal').first().o.beginElement();
// });
// EOF;  
	return $n;
}

function igk_html_node_BMCSelect($id){
	$n = igk_createNode("div");
	$n["class"] = "igk-winui-bmc-select";
	$select = $n->addHtmlNode("select");
	$select->setId($id);

	$n->Item = $select;

	$d = $n->addNoTagNode();
	$d->addDiv()->setClass("select__ripple");
	return $n;
}


