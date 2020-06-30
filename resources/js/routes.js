
import Dashboard from './pages/Dashboard'
import Settings from './pages/Settings'
import Users from './pages/Users'
import Roles from './pages/Roles'
import Permissions from './pages/Permissions'
import Activities from './pages/Activities'
// import homepage from './components/public/home/index'
import contact from './components/public/contact'

//supplier component---
let storesupplier = require('./components/supplier/create.vue').default;
let supplier = require('./components/supplier/index.vue').default;
let editsupplier = require('./components/supplier/edit.vue').default;
let supplierAccount = require('./components/supplier/accountEntry.vue').default;
let detailssupplier = require('./components/supplier/details.vue').default;
let editSupplierAccount = require('./components/supplier/editAccount.vue').default;
let invoiceSupplier = require('./components/supplier/invoice.vue').default;
// Saler
let storesaler = require('./components/wholesaler/create.vue').default;
let saler = require('./components/wholesaler/index.vue').default;
let editsaler = require('./components/wholesaler/edit.vue').default;
//category----
let storecategory = require('./components/category/create.vue').default;
let category = require('./components/category/index.vue').default;
let editcategory = require('./components/category/edit.vue').default;
//product----
let storeproduct = require('./components/product/create.vue').default;
let product = require('./components/product/index.vue').default;
let editproduct = require('./components/product/edit.vue').default;
//store products
let allstoreproducts = require('./components/shop/index.vue').default;
//online products
let allonlineproducts = require('./components/online/index.vue').default;
//expense Category--
let storeexpensecategory = require('./components/expenseCategory/create.vue').default;
let expensecategory = require('./components/expenseCategory/index.vue').default;
let editexpensecategory = require('./components/expenseCategory/edit.vue').default;
// Expense
let storeexpense = require('./components/expense/create.vue').default;
let expense = require('./components/expense/expense.vue').default;
let editexpense = require('./components/expense/edit.vue').default;

//stock---
let stock = require('./components/product/stock.vue').default;
let editstock = require('./components/product/edit-stock.vue').default;
let transfer = require('./components/product/transfer.vue').default;
let transferstock = require('./components/product/transfer-stock.vue').default;
//customers
let storecustomer = require('./components/customer/create.vue').default;
let customer = require('./components/customer/index.vue').default;
let editcustomer = require('./components/customer/edit.vue').default;
//point of sale
let pos = require('./components/pos/pointofsale.vue').default;
let shoppos = require('./components/pos/shopPointofsale.vue').default;
let onlinepos = require('./components/pos/pointofsale.vue').default;
let wholepos = require('./components/pos/wholesalepos.vue').default;
//order--
let order = require('./components/order/order.vue').default;
let vieworder = require('./components/order/vieworder.vue').default;
let searchorder  = require('./components/order/search.vue').default;
let posinvoice  = require('./components/order/posinvoice.vue').default;
let refund  = require('./components/order/refund.vue').default;
let refundOption  = require('./components/order/refundOption.vue').default;
let exchange  = require('./components/order/exchange.vue').default;
let allorder = require('./components/order/allorder.vue').default;
let statusOrder = require('./components/order/statusOrder.vue').default;
let courierOrder = require('./components/order/courierOrder.vue').default;
let delevaredorder = require('./components/order/delevaredOrder.vue').default;
let orderStatusChange = require('./components/order/orderStatusChange.vue').default;

//stores--
let addStore = require('./components/stores/create.vue').default;
let storelist = require('./components/stores/index.vue').default;
let editstores  = require('./components/stores/edit.vue').default;
//size--
let storesize = require('./components/size/create.vue').default;
let size = require('./components/size/index.vue').default;
let editsize  = require('./components/size/edit.vue').default;
//size--
let storestatus = require('./components/status/create.vue').default;
let status = require('./components/status/index.vue').default;
let editstatus  = require('./components/status/edit.vue').default;
//Company--
let storecompany = require('./components/company/create.vue').default;
let company = require('./components/company/index.vue').default;
let editcompany  = require('./components/company/edit.vue').default;

// Report
let reportorder  = require('./components/report/dateWiseReport.vue').default;
let reportorderProducts  = require('./components/report/productWiseReport.vue').default;
let reportorderCategory  = require('./components/report/categoryWiseReport.vue').default;
let reportorderCourier  = require('./components/report/courierWiseReport.vue').default;
let reportorderStore  = require('./components/report/storeWiseReport.vue').default;
let reportExpense  = require('./components/report/dateWiseExpenseReport.vue').default;
let reportExpenseCategory  = require('./components/report/expenseCategoryWiseReport.vue').default;
let reportProfit  = require('./components/report/dateWiseProfitReport.vue').default;
// front
 let homepage  = require('./components/web/home/index.vue').default;
let categoryShow  = require('./components/web/category/show.vue').default;
let productShow  = require('./components/web/product/show.vue').default;
let publicCart  = require('./components/web/cart/cart.vue').default;
let allProduct  = require('./components/web/product/index.vue').default;
let location  = require('./components/web/home/location.vue').default;

export const routes = [
    {
        path: '/admin/dashboard',
        component: Dashboard
    },
    {
        path: '/admin/users',
        component: Users
    },
    {
        path: '/admin/roles',
        component: Roles
    },
    {
        path: '/admin/permissions',
        component: Permissions
    },
    {
        path: '/admin/settings',
        component: Settings
    },
    {
        path: '/admin/activities',
        component: Activities
    },
    {
        path: '/',
        component: homepage
    },
    {
        path: '/contact',
        component: contact
    },
    { path: '/admin/stock', component: stock , name:'stock' },
    { path: '/admin/edit-stock/:id', component: editstock, name:'edit-stock' },
    { path: '/admin/transfer', component: transfer , name:'transfer' },
    { path: '/admin/transfer-stock/:id', component: transferstock, name:'transfer-stock' },
    //supplier---
    { path: '/admin/store-supplier', component: storesupplier, name:'store-supplier' },
    { path: '/admin/supplier', component: supplier, name:'supplier' },
    { path: '/admin/edit-supplier/:id', component: editsupplier, name:'edit-supplier' },
    { path: '/admin/supplier-account', component: supplierAccount, name:'supplierAccount' },
    { path: '/admin/edit-supplier-account/:id', component: editSupplierAccount, name:'editSupplierAccount' },
    { path: '/admin/supplier-details/:id', component: detailssupplier, name:'detailssupplier' },
    { path: '/admin/supplier-invoice', component: invoiceSupplier, name:'invoiceSupplier' },
    // whole Saler
    { path: '/admin/store-saler', component: storesaler, name:'store-saler' },
    { path: '/admin/salers', component: saler, name:'saler' },
    { path: '/admin/edit-saler/:id', component: editsaler, name:'edit-saler' },
    //category---
    { path: '/admin/store-category', component: storecategory, name:'store-category' },
    { path: '/admin/category', component: category, name:'category' },
    { path: '/admin/edit-category/:id', component: editcategory, name:'edit-category' },
    //product---
    { path: '/admin/store-product', component: storeproduct, name:'store-product' },
    { path: '/admin/product', component: product, name:'product' },
    { path: '/admin/edit-product/:id', component: editproduct, name:'edit-product' },

    //expense---
    { path: '/admin/store-expense', component: storeexpense, name:'store-expense' },
    { path: '/admin/expense', component: expense, name:'expense' },
    { path: '/admin/edit-expense/:id', component: editexpense, name:'edit-expense' },
    //customers----
    { path: '/admin/store-customer', component: storecustomer, name:'store-customer' },
    { path: '/admin/customer', component: customer, name:'customer' },
    { path: '/admin/edit-customer/:id', component: editcustomer, name:'edit-customer' },
    //Store Products----
    { path: '/admin/all-store-product', component: allstoreproducts, name:'all-store-product' },
    //Online Products----
    { path: '/admin/all-online-product', component: allonlineproducts, name:'all-online-product' },
    //Stores----
    { path: '/admin/add-store', component: addStore, name:'add-store' },
    { path: '/admin/store-list', component: storelist, name:'store-list' },
    { path: '/admin/edit-store/:id', component: editstores, name:'edit-store' },
    //point of sale--
    { path: '/admin/pos', component: pos, name:'pos' },
    { path: '/admin/shop-pos', component: shoppos, name:'shoppos' },
    { path: '/admin/online-pos', component: onlinepos, name:'onlinepos' },
    { path: '/admin/wholesale-pos', component: wholepos, name:'wholepos' },
    //order
    { path: '/admin/order', component: order, name:'order' },
    { path: '/admin/all-order', component: allorder, name:'allorder' },
    { path: '/admin/status-order', component: statusOrder, name:'statusOrder' },
    { path: '/admin/courier-order', component: courierOrder, name:'courierOrder' },
    // { path: '/pending-order', component: pendingorder, name:'pendingorder' },
    { path: '/admin/delevared-order', component: delevaredorder, name:'delevaredorder' },
    { path: '/admin/view-order/:id', component: vieworder, name:'view-order' },
    { path: '/admin/order-status-change/:id', component: orderStatusChange, name:'orderStatusChange' },
    { path: '/admin/searchorder', component: searchorder, name:'searchorder' },
    { path: '/admin/pos-invoice/:id', component: posinvoice, name:'posinvoice' },
    { path: '/admin/refund/:id', component: refund, name:'refund' },
    { path: '/admin/refund-option/:id', component: refundOption, name:'refundOption' },
    { path: '/admin/exchange/:id', component: exchange, name:'exchange' },
    //Expense category---
    { path: '/admin/store-expense-category', component: storeexpensecategory, name:'store-expense-category' },
    { path: '/admin/expense-category', component: expensecategory, name:'expense-category' },
    { path: '/admin/edit-expense-category/:id', component: editexpensecategory, name:'edit-expense-category' },
    //Size---
    { path: '/admin/store-size', component: storesize, name:'store-size' },
    { path: '/admin/size', component: size, name:'size' },
    { path: '/admin/edit-size/:id', component: editsize, name:'edit-size' },
    //Company---
    { path: '/admin/store-company', component: storecompany, name:'store-company' },
    { path: '/admin/company', component: company, name:'company' },
    { path: '/admin/edit-company/:id', component: editcompany, name:'edit-company' },
    //Status---
    { path: '/admin/store-status', component: storestatus, name:'store-status' },
    { path: '/admin/status', component: status, name:'status' },
    { path: '/admin/edit-status/:id', component: editstatus, name:'edit-status' },

    // Report
    { path: '/admin/reportorder', component: reportorder, name:'reportorder' },
    { path: '/admin/reportorder-products', component: reportorderProducts, name:'reportorderProducts' },
    { path: '/admin/reportorder-category', component: reportorderCategory, name:'reportorderCategory' },
    { path: '/admin/reportorder-courier', component: reportorderCourier, name:'reportorderCourier' },
    { path: '/admin/reportorder-store', component: reportorderStore, name:'reportorderStore' },
    { path: '/admin/report-expense', component: reportExpense, name:'reportExpense' },
    { path: '/admin/report-expense-category', component: reportExpenseCategory, name:'reportExpenseCategory' },
    { path: '/admin/report-profit', component: reportProfit, name:'reportProfit' },

    // frontend
     { path: '/', component: homepage, name:'homepage' },
    { path: '/show-category/:id', component: categoryShow, name:'categoryShow' },
    { path: '/show-product/:id', component: productShow, name:'productShow' },
    { path: '/public-cart/', component: publicCart, name:'publicCart' },
    { path: '/public-product/', component: allProduct, name:'allProduct' },
    { path: '/location/', component: location, name:'location' },

];
