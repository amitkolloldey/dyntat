<?php
/**
 * Created by PhpStorm.
 * User: parvez
 * Date: 4/16/2018
 * Time: 4:42 PM
 */

function tk( $amount = 0 ) {
	$tmp      = explode( '.', $amount ); // for float or double values
	$strMoney = '';
	$divide   = 1000;
	$amount   = $tmp[0];
	$strMoney .= str_pad( $amount % $divide, 3, '0', STR_PAD_LEFT );
	$amount   = (int) ( $amount / $divide );
	while ( $amount > 0 ) {
		$divide   = 100;
		$strMoney = str_pad( $amount % $divide, 2, '0', STR_PAD_LEFT ) . ',' . $strMoney;
		$amount   = (int) ( $amount / $divide );
	}

	if ( substr( $strMoney, 0, 1 ) == '0' ) {
		$strMoney = substr( $strMoney, 1 );
	}

	if ( isset( $tmp[1] ) ) // if float and double add the decimal digits here.
	{
		return $strMoney . '.' . $tmp[1];
	}

	return $strMoney;
}