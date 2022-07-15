<?php

namespace app\controller;

use app\core\Controller;
use App\Model\Voucher;

class TemplateController extends Controller {
  public function voucher() {
    $objVoucher = new Voucher;
    $this->load('voucher/voucher', [
      "documentType" => $objVoucher->getDocumentType(),
      "idBudget" => $objVoucher->getidVoucher(),
      "totBudget" => number_format($objVoucher->getTotBudget(), 2, ',', '.'),
      "taxIncludes" => number_format($objVoucher->getTaxIncludes(), 2, ',', '.'),
      "buyerName" => $objVoucher->getBuyerName(),
      "buyerEmail" => $objVoucher->getBuyerEmail(),
      "buyerPhone" => formatPhone($objVoucher->getBuyerPhone()),
      "amountPeople" => $objVoucher->getAmountPeople(),
      "amountBags" => $objVoucher->getAmoutBags(),
      "weightBags" => number_format($objVoucher->getWeightBags(), 0),
      "departureDate" => $objVoucher->getDepartureDate(),
      "backDate" => $objVoucher->getDepartureDate(),
      "accommodationName" => $objVoucher->getAccommodationName(),
      "accommodationAddress" => $objVoucher->getAccommodationAddress(),
      "services" => $objVoucher->getServices()
    ]);
  }
}