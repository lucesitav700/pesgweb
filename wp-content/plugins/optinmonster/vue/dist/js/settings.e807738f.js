"use strict";(self["webpackChunkoptinmonster_wordpress_plugin_vue_app"]=self["webpackChunkoptinmonster_wordpress_plugin_vue_app"]||[]).push([[472],{66833:function(t,e,s){s.r(e),s.d(e,{default:function(){return l}});var a=function(){var t=this,e=t._self._c;return e("core-page",[e("div",{staticClass:"omapi-settings"},[e(t.componentName,{tag:"component",scopedSlots:t._u([{key:"tabs",fn:function(){return[e("common-tabnav",{attrs:{active:t.currentTab,tabs:t.allTabs},on:{go:t.goTo}})]},proxy:!0}])})],1)])},n=[],o=s(45047),i={mixins:[o.v],data(){return{pageSlug:"settings"}},computed:{componentName(){return`settings-${this.currentTab}`}},methods:{goTo(t){if("billing"===t){"billing"===this.selectedTab&&this.goTab({page:this.pageSlug});let t=window.location.href;return window.open(this.$urls.app(`account/billing/?utm_source=WordPress&utm_medium=BillingSettingsTab&utm_campaign=Plugin&return=${t}`))}if("subaccounts"===t){"subaccounts"===this.selectedTab&&this.goTab({page:this.pageSlug});let t=window.location.href;return window.open(this.$urls.app(`account/users/?utm_source=WordPress&utm_medium=SubAccountsSettingsTab&utm_campaign=Plugin&return=${t}`))}this.goTab({page:this.pageSlug,tab:t})}}},u=i,r=s(81656),g=(0,r.A)(u,a,n,!1,null,null,null),l=g.exports},45047:function(t,e,s){s.d(e,{v:function(){return i}});var a=s(58156),n=s.n(a),o=s(95353);const i={computed:{...(0,o.L8)("tabs",["settingsTab","settingsTabs"]),allTabs(){return this.$store.getters[`tabs/${this.pageSlug}Tabs`]},currentTab(){return this.$store.getters[`tabs/${this.pageSlug}Tab`]},selectedTab(){return this.$get("$route.params.selectedTab")}},mounted(){this.goToSelected()},watch:{$route(t){this.goTo(n()(t,"params.selectedTab"))}},methods:{...(0,o.i0)("tabs",["goTab"]),navTo(t){this.goTab({page:this.pageSlug,tab:t,baseUrl:""})},goTo(t){this.goTab({page:this.pageSlug,tab:t})},goToSelected(){this.selectedTab&&this.goTo(this.selectedTab)}}}}}]);
//# sourceMappingURL=settings.e807738f.js.map