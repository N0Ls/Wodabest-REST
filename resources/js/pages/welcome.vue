<template>
  <div class="container mt-5">
    <div class="text-center">
      <div class="container mt-60">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="section-title text-center mb-4 pb-2">
              <div class="col-12 mb-4">
                <img
                  class="img-fluid welcome-logo"
                  src="/img/logo/wodabest.png"
                />
              </div>
              <div class="col-12 mb-4">
                <router-link
                  :to="{ name: 'game' }"
                  class="nav-link"
                  active-class="active"
                >
                  <v-button class="btn btn-primary">
                    {{ $t("play") }}
                  </v-button>
                </router-link>
              </div>
              <p class="text-muted para-desc mx-auto mb-0">
                {{ $t('welcome_introduction') }}
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div
              class="feature feature-transition shadow-large p-4 rounded text-left"
            >
              <div class="icon text-center rounded-circle">
                <img
                  src="img/icons/gallery.svg"
                />
              </div>
              <h5 class="mt-2">{{ $t("gallery") }}</h5>
              <p class="text-muted mb-0">
                {{ $t('welcome_gallery_introduction') }}
              </p>
              <div class="mt-3 text-right">
                <router-link
                  :to="{ name: 'images' }"
                  class="nav-link"
                  active-class="active"
                >
                  <a class="btn btn-icon btn-pills btn-outline-primary">
                    <img
                      src="img/icons/chevron-right.svg"
                    />
                  </a>
                </router-link>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div
              class="feature feature-transition shadow-large p-4 rounded text-left"
            >
              <div class="icon text-center rounded-circle">
                <img
                      src="img/icons/ranking.svg"
                    />
              </div>
              <h5 class="mt-2">{{ $t("ranking") }}</h5>
              <p class="text-muted mb-0">
                {{ $t('welcome_ranking_introduction') }}
              </p>
              <div class="mt-3 text-right">
                <router-link
                  :to="{ name: 'ranking' }"
                  class="nav-link"
                  active-class="active"
                >
                  <a class="btn btn-icon btn-pills btn-outline-primary"
                    ><img
                      src="img/icons/chevron-right.svg"
                  /></a>
                </router-link>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div
              class="feature feature-transition shadow-large p-4 rounded text-left"
            >
              <div class="icon text-center rounded-circle">
                <img
                      src="img/icons/upload.svg"
                    />
              </div>
              <h5 class="mt-2">{{ $t("upload") }}</h5>
              <p class="text-muted mb-0">
                {{ $t('welcome_upload_introduction') }}
              </p>
              <div class="mt-3 text-right">
                <router-link
                  :to="{ name: 'upload' }"
                  class="nav-link"
                  active-class="active"
                >
                  <a class="btn btn-icon btn-pills btn-outline-primary"
                    ><img
                      src="img/icons/chevron-right.svg"
                  /></a>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  layout: "default",

  metaInfo() {
    return { title: this.$t("welcome") };
  },

  computed: mapGetters({
    authenticated: "auth/check"
  })
};
</script>
