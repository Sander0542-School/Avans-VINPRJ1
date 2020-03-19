<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class Customer
 *
 * @property int $id
 * @property string $name
 * @property Collection|CustomerAddress[] $customer_addresses
 * @property Collection|CustomerContact[] $customer_contacts
 * @property Collection|CustomerDiscount[] $customer_discounts
 * @property Collection|Order[] $orders
 * @package App\Models
 * @property-read int|null $customer_addresses_count
 * @property-read int|null $customer_contacts_count
 * @property-read int|null $customer_discounts_count
 * @property-read int|null $orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereName($value)
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * Class CustomerAddress
 *
 * @property int $id
 * @property int $customer_id
 * @property string $street
 * @property string $number
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * @property Customer $customer
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerAddress whereZipcode($value)
 */
	class CustomerAddress extends \Eloquent {}
}

namespace App\Models{
/**
 * Class CustomerContact
 *
 * @property int $id
 * @property int $customer_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $jobtitle
 * @property Customer $customer
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerContact whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerContact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerContact whereJobtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerContact wherePhone($value)
 */
	class CustomerContact extends \Eloquent {}
}

namespace App\Models{
/**
 * Class CustomerDiscount
 *
 * @property int $customer_id
 * @property int $year
 * @property int $discount
 * @property Customer $customer
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerDiscount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerDiscount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerDiscount query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerDiscount whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerDiscount whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CustomerDiscount whereYear($value)
 */
	class CustomerDiscount extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Order
 *
 * @property int $id
 * @property int $customer_id
 * @property Carbon $date
 * @property string $status
 * @property Customer $customer
 * @property Collection|OrderContainer[] $order_containers
 * @property OrderInvoice $order_invoice
 * @property Collection|OrderNote[] $order_notes
 * @property Collection|Product[] $products
 * @package App\Models
 * @property int $customer_address_id
 * @property-read \App\Models\CustomerAddress $customer_address
 * @property-read mixed $customer_discount
 * @property-read mixed $discount
 * @property-read mixed $subtotal
 * @property-read mixed $total
 * @property-read int|null $order_containers_count
 * @property-read int|null $order_notes_count
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCustomerAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereStatus($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * Class OrderContainer
 *
 * @property int $order_id
 * @property string $containercode
 * @property Order $order
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderContainer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderContainer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderContainer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderContainer whereContainercode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderContainer whereOrderId($value)
 */
	class OrderContainer extends \Eloquent {}
}

namespace App\Models{
/**
 * Class OrderInvoice
 *
 * @property int $order_id
 * @property bool $paid
 * @property Order $order
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderInvoice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderInvoice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderInvoice query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderInvoice whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderInvoice wherePaid($value)
 */
	class OrderInvoice extends \Eloquent {}
}

namespace App\Models{
/**
 * Class OrderNote
 *
 * @property int $id
 * @property int $order_id
 * @property string $notes
 * @property Order $order
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderNote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderNote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderNote query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderNote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderNote whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderNote whereOrderId($value)
 */
	class OrderNote extends \Eloquent {}
}

namespace App\Models{
/**
 * Class OrderProduct
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property float $price
 * @property int $quantity
 * @property Order $order
 * @property Product $product
 * @property Collection|RobotQueue[] $robot_queues
 * @package App\Models
 * @property-read int|null $robot_queues_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderProduct whereQuantity($value)
 */
	class OrderProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Product
 *
 * @property int $id
 * @property string $name
 * @property int $ordercode
 * @property float $price
 * @property string $short_description
 * @property string $long_description
 * @property string $active_substances
 * @property string $location
 * @property int $stock
 * @property int $minimum_stock
 * @property int $order_quantity
 * @property float $packaging_length
 * @property float $packaging_width
 * @property float $packaging_heigth
 * @property int $consumer_packages
 * @property string $packaging_type
 * @property Collection|Order[] $orders
 * @property Collection|SupplierOrder[] $supplier_orders
 * @property Collection|Supplier[] $suppliers
 * @package App\Models
 * @property-read int|null $orders_count
 * @property-read int|null $supplier_orders_count
 * @property-read int|null $suppliers_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereActiveSubstances($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereConsumerPackages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereLongDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereMinimumStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereOrderQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereOrdercode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePackagingHeigth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePackagingLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePackagingType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePackagingWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereStock($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Robot
 *
 * @property int $id
 * @property string $corridor
 * @property Collection|RobotQueue[] $robot_queues
 * @package App\Models
 * @property-read int|null $robot_queues_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Robot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Robot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Robot query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Robot whereCorridor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Robot whereId($value)
 */
	class Robot extends \Eloquent {}
}

namespace App\Models{
/**
 * Class RobotQueue
 *
 * @property int $robot_id
 * @property int $order_product_id
 * @property Robot $robot
 * @property OrderProduct $order_product
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RobotQueue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RobotQueue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RobotQueue query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RobotQueue whereOrderProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\RobotQueue whereRobotId($value)
 */
	class RobotQueue extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Supplier
 *
 * @property int $id
 * @property string $name
 * @property string $street
 * @property string $number
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zipcode
 * @property string $website
 * @property Collection|SupplierContact[] $supplier_contacts
 * @property Collection|SupplierOrder[] $supplier_orders
 * @property Collection|Product[] $products
 * @package App\Models
 * @property-read int|null $products_count
 * @property-read int|null $supplier_contacts_count
 * @property-read int|null $supplier_orders_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Supplier whereZipcode($value)
 */
	class Supplier extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SupplierContact
 *
 * @property int $id
 * @property int $supplier_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $jobtitle
 * @property Supplier $supplier
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierContact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierContact whereJobtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierContact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierContact whereSupplierId($value)
 */
	class SupplierContact extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SupplierOrder
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $product_id
 * @property int $amount
 * @property float $price
 * @property Carbon $date
 * @property Product $product
 * @property Supplier $supplier
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierOrder whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierOrder whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierOrder wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierOrder whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierOrder whereSupplierId($value)
 */
	class SupplierOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * Class SupplierProduct
 *
 * @property int $supplier_id
 * @property int $product_id
 * @property float $price
 * @property Product $product
 * @property Supplier $supplier
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SupplierProduct whereSupplierId($value)
 */
	class SupplierProduct extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 */
	class User extends \Eloquent {}
}

