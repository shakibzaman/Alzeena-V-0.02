<template>
  <v-list dense>
    <v-list-tile exact to="/admin/dashboard">
      <v-list-tile-action>
        <v-icon>dashboard</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title>Dashboard</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>

    <v-list-group no-action>
      <v-list-tile slot="activator">
        <v-list-tile-action>
          <v-icon>account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>User Management</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

      <v-list-tile to="/admin/users">
        <v-list-tile-action>
          <v-icon>account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Users</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

      <v-list-tile to="/admin/roles">
        <v-list-tile-action>
          <v-icon>account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Roles</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>

      <v-list-tile to="/admin/permissions">
        <v-list-tile-action>
          <v-icon>account_circle</v-icon>
        </v-list-tile-action>
        <v-list-tile-content>
          <v-list-tile-title>Permissions</v-list-tile-title>
        </v-list-tile-content>
      </v-list-tile>
    </v-list-group>

    <v-list-tile to="/admin/online-pos">
      <v-list-tile-action>
        <v-icon>loyalty</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title>POS</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>
      <v-list-tile to="/admin/shop-pos">
          <v-list-tile-action>
              <v-icon>store</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Shop POS</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>
      <v-list-tile to="/admin/wholesale-pos">
          <v-list-tile-action>
              <v-icon>emoji_people</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Whole Sale POS</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>
      <v-list-group no-action>
          <v-list-tile slot="activator">
              <v-list-tile-action>
                  <v-icon>group</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Supplier</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/supplier">
              <v-list-tile-action>
                  <v-icon>people_alt</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Supplier</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/supplier-account">
              <v-list-tile-action>
                  <v-icon>emoji_symbols</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Supplier Account</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/supplier-invoice">
              <v-list-tile-action>
                  <v-icon>text_snippet</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Supplier Invoice</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
      </v-list-group>
      <v-list-group no-action>
          <v-list-tile slot="activator">
              <v-list-tile-action>
                  <v-icon>group</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Whole Saler</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/salers">
              <v-list-tile-action>
                  <v-icon>people_alt</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Saler</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/supplier-account">
              <v-list-tile-action>
                  <v-icon>emoji_symbols</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Supplier Account</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/supplier-invoice">
              <v-list-tile-action>
                  <v-icon>text_snippet</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Supplier Invoice</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
      </v-list-group>
    <v-list-tile to="/admin/product">
      <v-list-tile-action>
          <v-icon>favorite</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
          <v-list-tile-title>Products</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>
      <v-list-tile to="/admin/all-online-product">
          <v-list-tile-action>
              <v-icon>airplay</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Online Product</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>
      <v-list-tile to="/admin/all-store-product">
          <v-list-tile-action>
              <v-icon>store_mall_directory</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Store Product</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>
      <v-list-tile to="/admin/customer">
          <v-list-tile-action>
              <v-icon>group</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
              <v-list-tile-title>Customers</v-list-tile-title>
          </v-list-tile-content>
      </v-list-tile>
      <v-list-group no-action>
          <v-list-tile slot="activator">
              <v-list-tile-action>
                  <v-icon>attach_money</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Expense</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/expense-category">
              <v-list-tile-action>
                  <v-icon>format_align_left</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Category</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/store-expense">
              <v-list-tile-action>
                  <v-icon>addchart</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Add Expense</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/expense">
              <v-list-tile-action>
                  <v-icon>list</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>All Expense</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
      </v-list-group>
      <v-list-group no-action>
          <v-list-tile slot="activator">
              <v-list-tile-action>
                  <v-icon>important_devices</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Stock</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/stock">
              <v-list-tile-action>
                  <v-icon>important_devices</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Stock</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/transfer">
              <v-list-tile-action>
                  <v-icon>input</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Transfer</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
      </v-list-group>
      <v-list-group no-action>
          <v-list-tile slot="activator">
              <v-list-tile-action>
                  <v-icon>assignment</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Orders</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/order">
              <v-list-tile-action>
                  <v-icon>calendar_today</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Todays Order</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/all-order">
              <v-list-tile-action>
                  <v-icon>article</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>All Orders</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/status-order">
              <v-list-tile-action>
                  <v-icon>check_circle</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Status Order</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/courier-order">
              <v-list-tile-action>
                  <v-icon>golf_course</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Courier Order</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/status-order">
              <v-list-tile-action>
                  <v-icon>child_friendly</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Status Order</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
      </v-list-group>
      <v-list-group no-action>
          <v-list-tile slot="activator">
              <v-list-tile-action>
                  <v-icon>event_note</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Reports</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/reportorder">
              <v-list-tile-action>
                  <v-icon>calendar_today</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Date Report</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/reportorder-products">
              <v-list-tile-action>
                  <v-icon>calendar_view_day</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Products</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/reportorder-category">
              <v-list-tile-action>
                  <v-icon>chrome_reader_mode</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Category</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/reportorder-courier">
              <v-list-tile-action>
                  <v-icon>commute</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Courier</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/reportorder-store">
              <v-list-tile-action>
                  <v-icon>dashboard</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Store</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/report-expense">
              <v-list-tile-action>
                  <v-icon>label_off</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Date Expense</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/report-expense-category">
              <v-list-tile-action>
                  <v-icon>label_important</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Category Expense</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/report-profit">
              <v-list-tile-action>
                  <v-icon>attach_money</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Profit</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
      </v-list-group>
    <v-list-tile to="/admin/settings">
      <v-list-tile-action>
        <v-icon>settings</v-icon>
      </v-list-tile-action>
      <v-list-tile-content>
        <v-list-tile-title>Settings</v-list-tile-title>
      </v-list-tile-content>
    </v-list-tile>
      <v-list-group no-action>
          <v-list-tile slot="activator">
              <v-list-tile-action>
                  <v-icon>app_settings_alt</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Settings</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/category">
              <v-list-tile-action>
                  <v-icon>notes</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Category</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/size">
              <v-list-tile-action>
                  <v-icon>strikethrough_s</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Size</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>

          <v-list-tile to="/admin/company">
              <v-list-tile-action>
                  <v-icon>apps</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Company</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/store-list">
              <v-list-tile-action>
                  <v-icon>home_work</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Store</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
          <v-list-tile to="/admin/status">
              <v-list-tile-action>
                  <v-icon>menu</v-icon>
              </v-list-tile-action>
              <v-list-tile-content>
                  <v-list-tile-title>Status</v-list-tile-title>
              </v-list-tile-content>
          </v-list-tile>
      </v-list-group>
  </v-list>
</template>


<script>
export default {

}

</script>


