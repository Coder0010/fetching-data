<?php

namespace App\Services;

use App\Env;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use App\Models\ProductInvoice;
use App\Services\Helpers\SetterAndGetter;
use App\Repositories\Contracts\InvoiceRepository;
use App\Repositories\Contracts\ProductRepository;
use App\Repositories\Contracts\CustomerRepository;
use App\Services\Contracts\SeedServiceInterface;
use App\Repositories\Contracts\ProductInvoiceRepository;

class SeedService implements SeedServiceInterface
{
    use SetterAndGetter;
    
    public function __construct(
        CustomerRepository $customerRepository,
        ProductRepository $productRepository,
        InvoiceRepository $invoiceRepository,
        ProductInvoiceRepository $productInvoiceRepository
    ) {
        $this->setCustomerRepository($customerRepository);
        $this->setProductRepository($productRepository);
        $this->setInvoiceRepository($invoiceRepository);
        $this->setProductInvoiceRepository($productInvoiceRepository);
    }

    public function save(array $data)
    {
        $counter = 0;
        foreach ($data as $key => $rows) {
            // Push Customer
            $customerName    = $data[$counter][Env::CUSTOMER_NAME_INDEX];
            $customerAddress = $data[$counter][Env::CUSTOMER_ADDRESS_INDEX];
            $customerModel   = $this->appendCustomer($customerName, $customerAddress);

            // Push Product
            $productName   = $data[$counter][Env::PRODUCT_NAME_INDEX];
            $productPrice  = $data[$counter][Env::PRODUCT_PRICE_INDEX];
            $productModel  = $this->appendProduct($productName, $productPrice);

            // Push Invoice
            $invoiceDate  = $data[$counter][Env::INVOICE_DATE_INDEX];
            $invoiceId    = $data[$counter][Env::INVOICE_ID_INDEX];
            $invoiceModel = $this->appendinvoice($invoiceId, $invoiceDate, $customerModel);
            
            // Push ProductInovice 
            $productInvoiceQuantity = $data[$counter][Env::QUANTITY_INDEX];
            $productInvoiceModel    = $this->appendProductInvoice($productInvoiceQuantity, $invoiceModel, $productModel);

            $counter++;
        }
    }

    public function appendCustomer(string $customerName, string $customerAddress) : Customer
    {
        $customerModel = (new Customer)->push($customerName, $customerAddress);
        // Check if Customer Name is Already Created
        $lastCustomer = $this->getCustomerRepository()->fetchBy("name", $customerName);
        if (count($lastCustomer) == 0) {
            $customerData = $this->getCustomerRepository()->create($customerModel);
            $customerModel->setId($customerData);
        } else {
            $customerModel->setId(intval($lastCustomer[0]["id"]));
        }
        return $customerModel;
    }

    public function appendProduct(string $productName, string $productPrice) : Product
    {
        $productModel  = (new Product)->push($productName, $productPrice);
        // Check if Product Name is Already Created
        $lastProduct   = $this->getProductRepository()->fetchBy("name", $productName);
        if (count($lastProduct) == 0) {
            $productData = $this->getProductRepository()->create($productModel);
            $productModel->setId($productData);
        } else {
            $productModel->setId(intval($lastProduct[0]["id"]));
        }
        return $productModel;
    }

    public function appendInvoice(int $invoiceId, string $invoiceDate, Customer $customerModel) : Invoice
    {
        $invoiceModel = (new Invoice)->push($invoiceDate, $customerModel->getId());
        $invoiceData = $this->getInvoiceRepository()->create($invoiceModel);
        $lastInvoice = $this->getInvoiceRepository()->fetchBy("id", $invoiceId);
        if (count($lastInvoice) == 0) {
            $invoiceModel->setId($invoiceData);
        } else {
            $invoiceModel->setId(intval($lastInvoice[0]["id"]));
        }
        return $invoiceModel;
    }

    public function appendProductInvoice(int $quantity, $invoiceModel, Product $productModel)
    {
        $productInvoiceModel = (new ProductInvoice)->push($invoiceModel->getId(), $productModel->getId());
        $lastProductInvoice = $this->getProductInvoiceRepository()->fetchRow($invoiceModel->getId(), $productModel->getId());
        for ($i=0; $i < intval($quantity); $i++) {
            if (count($lastProductInvoice) == 0) {
                $this->getProductInvoiceRepository()->create($productInvoiceModel);
            }
        }
        return $productInvoiceModel;
    }

}
