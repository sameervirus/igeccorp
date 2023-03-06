(() => {
  var e = {
      588: () => {
        function e(t) {
          if (!t) return t;
          var a;
          if (
            ([Number, String, Boolean].forEach(function (e) {
              t instanceof e && (a = e(t));
            }),
            void 0 === a)
          )
            if ("[object Array]" === Object.prototype.toString.call(t))
              (a = []),
                t.forEach(function (t, s, n) {
                  a[s] = e(t);
                });
            else if ("object" == typeof t)
              if (t.nodeType && "function" == typeof t.cloneNode)
                a = t.cloneNode(!0);
              else if (t.prototype) a = t;
              else if (t instanceof Date) a = new Date(t);
              else for (var s in ((a = {}), t)) a[s] = e(t[s]);
            else a = t;
          return a;
        }
        jQuery(function (t) {
          function a(e) {
            var a = window.scrollY;
            t("body").addClass("menu-visible"),
              t("body").css({
                top: "-" + a + "px",
              }),
              e.preventDefault();
          }
          function s(e) {
            var a = t("body").css("top");
            t("body").removeClass("menu-visible"),
              t("body").css({
                top: "",
              }),
              window.scrollTo(0, -1 * parseInt(a || "0")),
              t("#site-navigation").removeClass("toggled"),
              l.setAttribute("aria-expanded", "false"),
              e.preventDefault();
          }
          const n = document.getElementById("site-navigation");
          if (!n) return;
          const l = n.getElementsByTagName("button")[0];
          if (void 0 === l) return;
          const i = n.getElementsByTagName("ul")[0];
          if (void 0 !== i) {
            if (
              (i.classList.contains("nav-menu") || i.classList.add("nav-menu"),
              l.addEventListener("click", function (e) {
                n.classList.toggle("toggled"),
                  "true" === l.getAttribute("aria-expanded")
                    ? s(e)
                    : (l.setAttribute("aria-expanded", "true"), a(e));
              }),
              t("#primary-menu").each(function () {
                t(this)
                  .find("li.menu-item-has-children")
                  .each(function (a, s) {
                    var n,
                      l = e(t(s).find("ul.sub-menu:first")),
                      i = t("<li>"),
                      r = t(this);
                    if (
                      (l.children().each(function () {
                        var e = t(this);
                        t(this).children("ul").length &&
                          t.each(
                            t(this).children("ul").children(),
                            function () {
                              t(this).addClass("sub-page"),
                                e.after(t(this)),
                                (e = e.next());
                            }
                          );
                      }),
                      i.attr("id", t(this).attr("id") + "-mega-menu-dropdown"),
                      l.attr(
                        "id",
                        t(this).attr("id") + "-mega-menu-dropdown-items"
                      ),
                      r
                        .find("> a:first")
                        .attr("data-link", r.find("> a:first").attr("href"))
                        .attr(
                          "href",
                          "#" + t(this).attr("id") + "-mega-menu-dropdown"
                        ),
                      i.append("<h4>" + t(this).find("a").html() + "</h4>"),
                      t(this).hasClass("small-mega"))
                    ) {
                      i.addClass("small-menu"), (n = 2);
                      var o = t(window).outerWidth() / 2;
                      listItemCenter = c(t(this)[0]).xCenter;
                      var d = listItemCenter - o;
                    } else n = 4;
                    d &&
                      i.css({
                        "margin-left": d + "px",
                      }),
                      i.append(l);
                    for (
                      var v = Math.ceil(l.children().length / n), m = "";
                      v > 0;

                    )
                      (m += (m ? " " : "") + "1fr"), v--;
                    i.find("ul.sub-menu").css({
                      "grid-template-rows": m,
                    }),
                      t("#mega-menu-holder .contain > ul").append(i);
                  });
              }),
              t(window).on("resize", function () {
                t("#primary-menu li.menu-item-has-children").each(function (
                  e,
                  a
                ) {
                  if (t(this).hasClass("small-mega")) {
                    var s = t(window).outerWidth() / 2;
                    listItemCenter = c(t(this)[0]).xCenter;
                    var n = listItemCenter - s;
                    n &&
                      t("#" + t(this).attr("id") + "-mega-menu-dropdown").css({
                        "margin-left": n + "px",
                      });
                  }
                });
              }),
              t("#site-navigation ul.menu > li.menu-item-has-children a").on(
                "click touchstart",
                function (e) {
                  t(t(this).attr("href")).length
                    ? (t(
                        "#site-navigation ul.menu > li.menu-item-has-children.active"
                      ).children("ul.sub-menu").length &&
                      !t("#mega-menu-holder ul li.active").is(":visible")
                        ? (window.location.href = t(
                            "#site-navigation ul.menu > li.menu-item-has-children.active a"
                          ).attr("data-link"))
                        : t(
                            "#site-navigation ul.menu > li.menu-item-has-children.active"
                          ).removeClass("active"),
                      t(t(this).attr("href")).hasClass("active")
                        ? (t(this).parent().removeClass("active"),
                          t("#mega-menu-holder ul li").removeClass("active"),
                          t("body").removeClass("mega-menu-toggled"))
                        : (t(this).parent().addClass("active"),
                          t("#mega-menu-holder ul li").removeClass("active"),
                          t("body").addClass("mega-menu-toggled"),
                          t(t(this).attr("href")).addClass("active")))
                    : (t(this).parent().hasClass("active")
                        ? (t(this).parent().removeClass("active"),
                          t("body").removeClass("mega-menu-toggled"))
                        : (t(
                            "#site-navigation ul.menu > li.menu-item-has-children.active"
                          ).removeClass("active"),
                          t(this).parent().addClass("active"),
                          t("body").addClass("mega-menu-toggled")),
                      t("#mega-menu-holder ul li").removeClass("active")),
                    e.preventDefault();
                }
              ),
              t(window).on("resize", function (e) {
                t(
                  ".search-form, .menu-main-menu-container, .top-header"
                ).addClass("no-anim"),
                  window.setTimeout(function () {
                    t(".no-anim").removeClass("no-anim");
                  }, 400),
                  t("#site-navigation").hasClass("toggled") &&
                  !t(".menu-toggle").is(":visible")
                    ? (s(e), t("#site-navigation").removeClass("toggled"))
                    : t("#site-navigation").hasClass("toggled") &&
                      t(".menu-toggle").is(":visible") &&
                      !t("body").hasClass("menu-visible") &&
                      (a(e), t("#site-navigation").addClass("toggled"));
              }),
              t(".accordion").each(function () {
                t(this).addClass("active"),
                  t(this)
                    .find(".toggle-accordion")
                    .bind("click", function (e) {
                      t(this).parent().hasClass("active") ||
                        t(this)
                          .parents(".accordion")
                          .find(".accordion-outer-panel.active")
                          .removeClass("active"),
                        t(this).parent().toggleClass("active"),
                        e.preventDefault();
                    });
              }),
              t("#currentNumScrollsAchievements").val(0),
              t("#currentNumScrollsNews").val(0),
              d(),
              t(window).on("resize", function () {
                d();
                var e = parseInt(t("#currentNumScrollsAchievements").val()),
                  a = t(".acheivement-scroll-wrapper ul li:first").outerWidth(),
                  s = parseFloat(
                    t(".acheivement-scroll-wrapper ul li:first").css(
                      "margin-right"
                    )
                  );
                t(".acheivement-scroll-wrapper").css({
                  transform: "translateX(-" + (e * a + e * s) + "px)",
                });
                var n = parseInt(t("#currentNumScrollsNews").val()),
                  l = t(".scroll-wrapper-inner > div:first").outerWidth();
                t(".scroll-wrapper-inner").css({
                  transform: "translateX(-" + n * l + "px)",
                });
              }),
              t(".achievements .scroll-navigation a.next").bind(
                "click",
                function (e) {
                  var a = parseInt(t("#currentNumScrollsAchievements").val());
                  if (a < parseInt(t("#totalNumScrollsAchievements").val())) {
                    t(".achievements .scroll-navigation a.prev").removeClass(
                      "disabled"
                    ),
                      a++;
                    var s = t(
                        ".acheivement-scroll-wrapper ul li:first"
                      ).outerWidth(),
                      n = parseFloat(
                        t(".acheivement-scroll-wrapper ul li:first").css(
                          "margin-right"
                        )
                      );
                    t(".acheivement-scroll-wrapper").css({
                      transform: "translateX(-" + (a * s + a * n) + "px)",
                    }),
                      t("#currentNumScrollsAchievements").val(a),
                      parseInt(t("#currentNumScrollsAchievements").val()) ==
                      parseInt(t("#totalNumScrollsAchievements").val())
                        ? t(".achievements .scroll-navigation a.next").addClass(
                            "disabled"
                          )
                        : t(
                            ".achievements .scroll-navigation a.next"
                          ).removeClass("disabled");
                  }
                  e.preventDefault();
                }
              ),
              t(".news-articles .scroll-navigation a.next").bind(
                "click",
                function (e) {
                  var a = parseInt(t("#currentNumScrollsNews").val());
                  if (a < parseInt(t("#totalNumScrollsNews").val())) {
                    t(".news-articles .scroll-navigation a.prev").removeClass(
                      "disabled"
                    ),
                      a++;
                    var s = t(".scroll-wrapper-inner > div:first").outerWidth();
                    t(".scroll-wrapper-inner").css({
                      transform: "translateX(-" + a * s + "px)",
                    }),
                      t("#currentNumScrollsNews").val(a),
                      parseInt(t("#currentNumScrollsNews").val()) ==
                      parseInt(t("#totalNumScrollsNews").val())
                        ? t(
                            ".news-articles .scroll-navigation a.next"
                          ).addClass("disabled")
                        : t(
                            ".news-articles .scroll-navigation a.next"
                          ).removeClass("disabled");
                  }
                  e.preventDefault();
                }
              ),
              t(".achievements .scroll-navigation a.prev").bind(
                "click",
                function (e) {
                  var a = parseInt(t("#currentNumScrollsAchievements").val());
                  if (a > 0) {
                    t(".achievements .scroll-navigation a.next").removeClass(
                      "disabled"
                    ),
                      a--;
                    var s = t(
                        ".acheivement-scroll-wrapper ul li:first"
                      ).outerWidth(),
                      n = parseFloat(
                        t(".acheivement-scroll-wrapper ul li:first").css(
                          "margin-right"
                        )
                      );
                    t(".acheivement-scroll-wrapper").css({
                      transform: "translateX(-" + (a * s + a * n) + "px)",
                    }),
                      t("#currentNumScrollsAchievements").val(a),
                      0 == parseInt(t("#currentNumScrollsAchievements").val())
                        ? t(".achievements .scroll-navigation a.prev").addClass(
                            "disabled"
                          )
                        : t(
                            ".achievements .scroll-navigation a.prev"
                          ).removeClass("disabled");
                  }
                  e.preventDefault();
                }
              ),
              t(".news-articles .scroll-navigation a.prev").bind(
                "click",
                function (e) {
                  var a = parseInt(t("#currentNumScrollsNews").val());
                  if ((parseInt(t("#totalNumScrollsNews").val()), a > 0)) {
                    t(".news-articles .scroll-navigation a.next").removeClass(
                      "disabled"
                    ),
                      a--;
                    var s = t(".scroll-wrapper-inner > div:first").outerWidth();
                    t(".scroll-wrapper-inner").css({
                      transform: "translateX(-" + a * s + "px)",
                    }),
                      t("#currentNumScrollsNews").val(a),
                      0 == parseInt(t("#currentNumScrollsNews").val())
                        ? t(
                            ".news-articles .scroll-navigation a.prev"
                          ).addClass("disabled")
                        : t(
                            ".news-articles .scroll-navigation a.prev"
                          ).removeClass("disabled");
                  }
                  e.preventDefault();
                }
              ),
              (window.onload = v()),
              window.addEventListener("resize", v),
              t(".swanky-gallery").length)
            ) {
              var r = [],
                o = [];
              t(".swanky-gallery").each(function () {
                var e = t(this);
                (o[e.index()] = !1),
                  e.on("mouseenter", "li", function () {
                    o[e.index()] = t(this).index() + 1;
                  }),
                  e.on("mouseleave", "li", function () {
                    "all" == o[e.index()] ||
                      e.hasClass("single-active") ||
                      (o[e.index()] = !1);
                  }),
                  e.on("click", "li a", function (a) {
                    if (
                      ((o[e.index()] = "all"),
                      t(this).hasClass("close") && (o[e.index()] = !1),
                      t(this).hasClass("back") || t(this).hasClass("next"))
                    )
                      (s = t(this)).parents("li").removeClass("active"),
                        t(this).hasClass("back")
                          ? s.parents("li").prev().length
                            ? (s.parents("li").prev().addClass("from-left"),
                              window.setTimeout(function () {
                                s.parents("li").prev().addClass("active");
                              }, 10))
                            : (s
                                .parents("li")
                                .parent()
                                .children(":last-child")
                                .addClass("from-left"),
                              window.setTimeout(function () {
                                s.parents("li")
                                  .parent()
                                  .children(":last-child")
                                  .addClass("active");
                              }, 10))
                          : s.parents("li").next().length
                          ? (s.parents("li").next().removeClass("from-left"),
                            window.setTimeout(function () {
                              s.parents("li").next().addClass("active");
                            }, 10))
                          : (s
                              .parents("li")
                              .parent()
                              .children(":first-child")
                              .removeClass("from-left"),
                            window.setTimeout(function () {
                              s.parents("li")
                                .parent()
                                .children(":first-child")
                                .addClass("active");
                            }, 10)),
                        window.setTimeout(function () {
                          e.find("li.active").length ||
                            (e.css({
                              height: "",
                            }),
                            e.find(".content").css({
                              "max-height": "",
                            })),
                            e.removeClass("loading");
                        }, 400);
                    else {
                      var s = t(this);
                      parseInt(t(window).outerWidth(!0)) > 560 &&
                        (e.css({
                          height: e.css("height"),
                        }),
                        e.find(".content").css({
                          "max-height": e.css("height"),
                        })),
                        e.toggleClass("single-active"),
                        s.parents("li").toggleClass("active"),
                        s.parents("li.active").attr("id") &&
                          ((location.href = "#"),
                          (location.href =
                            "#" + s.parents("li.active").attr("id"))),
                        window.setTimeout(function () {
                          e.find("li.active").length ||
                            (e.css({
                              height: "",
                            }),
                            e.find(".content").css({
                              "max-height": "",
                            })),
                            e.removeClass("loading");
                        }, 400);
                    }
                    a.preventDefault();
                  }),
                  e.children().length > 6 &&
                    !e.hasClass("no-rotate") &&
                    (r[e.index()] = window.setInterval(function () {
                      var t = m(7, e.find("li:nth-child(n+6)").length - 1 + 6),
                        a = m(1, 6);
                      o[e.index()] ||
                        (function (e, t, a) {
                          var s = e
                            .find("li:nth-child(" + t + ") .gallery-item")
                            .clone(!0);
                          s.addClass("fade"),
                            e
                              .find("li:nth-child(" + a + ") .gallery-item")
                              .addClass("fade"),
                            e.find("li:nth-child(" + a + ")").append(s),
                            window.setTimeout(function () {
                              e
                                .find(
                                  "li:nth-child(" +
                                    a +
                                    ") .gallery-item:last-child"
                                )
                                .removeClass("fade"),
                                window.setTimeout(function () {
                                  e.find("li:nth-child(" + t + ")").html(
                                    e
                                      .find(
                                        "li:nth-child(" +
                                          a +
                                          ") .gallery-item:first-child"
                                      )
                                      .clone(!0)
                                      .removeClass("fade")
                                  ),
                                    e
                                      .find(
                                        "li:nth-child(" +
                                          a +
                                          ") .gallery-item:first-child"
                                      )
                                      .remove();
                                }, 500);
                            }, 200);
                        })(e, t, a);
                    }, 5e3));
              });
            }
            t(".news-categories").length &&
              (t(".mobile-category-toggle").bind("click", function (e) {
                t(this).toggleClass("active"),
                  t(".news-categories").toggleClass("active"),
                  e.preventDefault();
              }),
              t(".news-categories li.selected")
                .parents("li")
                .addClass("active"),
              t(".news-categories li a").bind("click", function (e) {
                t(this).parent().find("ul").length &&
                  (t(this).parent().toggleClass("active"), e.preventDefault());
              }));
          } else l.style.display = "none";
          function c(e) {
            const t = e.getBoundingClientRect(),
              a = {};
            for (const e in t) a[e] = t[e];
            return (
              (a.xCenter = (t.left + t.right) / 2),
              (a.yCenter = (t.top + t.bottom) / 2),
              a
            );
          }
          function d() {
            var e = t(".acheivement-scroll-wrapper ul li").outerWidth(),
              a = t(".acheivement-scroll-wrapper ul li")
                .parent()
                .parent()
                .outerWidth();
            t("#AchievementsPerScroll").val(Math.floor(a / e)),
              t("#totalNumScrollsAchievements").val(
                parseInt(t("#totalAchievementsPosts").val()) -
                  parseInt(t("#AchievementsPerScroll").val())
              );
            var s = t(".news-article").parent().outerWidth(),
              n = t(".news-article").parent().parent().outerWidth();
            t("#newsPostsPerScroll").val(Math.floor(n / s)),
              t("#totalNumScrollsNews").val(
                parseInt(t("#totalNewsPosts").val()) -
                  parseInt(t("#newsPostsPerScroll").val())
              ),
              parseInt(t("#totalAchievementsPosts").val()) <=
              parseInt(t("#AchievementsPerScroll").val())
                ? t(".achievements .scroll-navigation").hide()
                : t(".achievements .scroll-navigation").show(),
              parseInt(t("#totalNewsPosts").val()) <=
              parseInt(t("#newsPostsPerScroll").val())
                ? t(".news-articles .scroll-navigation").hide()
                : t(".news-articles .scroll-navigation").show(),
              parseInt(t("#totalNumScrollsAchievements").val()) <
                parseInt(t("#currentNumScrollsAchievements").val()) &&
                t("#currentNumScrollsAchievements").val(
                  parseInt(t("#totalNumScrollsAchievements").val())
                ),
              parseInt(t("#totalNumScrollsNews").val()) <
                parseInt(t("#currentNumScrollsNews").val()) &&
                t("#currentNumScrollsNews").val(
                  parseInt(t("#totalNumScrollsNews").val())
                ),
              0 == parseInt(t("#currentNumScrollsAchievements").val())
                ? t(".achievements .scroll-navigation a.prev").addClass(
                    "disabled"
                  )
                : t(".achievements .scroll-navigation a.prev").removeClass(
                    "disabled"
                  ),
              parseInt(t("#currentNumScrollsAchievements").val()) ==
              parseInt(t("#totalNumScrollsAchievements").val())
                ? t(".achievements .scroll-navigation a.next").addClass(
                    "disabled"
                  )
                : t(".achievements .scroll-navigation a.next").removeClass(
                    "disabled"
                  ),
              0 == parseInt(t("#currentNumScrollsNews").val())
                ? t(".news-articles .scroll-navigation a.prev").addClass(
                    "disabled"
                  )
                : t(".news-articles .scroll-navigation a.prev").removeClass(
                    "disabled"
                  ),
              parseInt(t("#currentNumScrollsNews").val()) ==
              parseInt(t("#totalNumScrollsNews").val())
                ? t(".news-articles .scroll-navigation a.next").addClass(
                    "disabled"
                  )
                : t(".news-articles .scroll-navigation a.next").removeClass(
                    "disabled"
                  );
          }
          function v() {
            for (
              allItems = document.getElementsByClassName("site-footer-links"),
                x = 0;
              x < allItems.length;
              x++
            )
              (e = allItems[x]),
                (grid = document.getElementsByClassName("link-grid")[0]),
                (rowHeight = parseInt(
                  window
                    .getComputedStyle(grid)
                    .getPropertyValue("grid-auto-rows")
                )),
                (rowGap = parseInt(
                  window.getComputedStyle(grid).getPropertyValue("grid-row-gap")
                )),
                (rowSpan = Math.ceil(
                  (e.querySelector(".content").getBoundingClientRect().height +
                    rowGap) /
                    (rowHeight + rowGap)
                )),
                (e.style.gridRowEnd = "span " + rowSpan);
            var e;
          }
          function m(e, t) {
            return Math.floor(Math.random() * (t - e + 1) + e);
          }
        });
      },
    },
    t = {};
  function a(s) {
    var n = t[s];
    if (void 0 !== n) return n.exports;
    var l = (t[s] = {
      exports: {},
    });
    return e[s](l, l.exports, a), l.exports;
  }
  (a.n = (e) => {
    var t = e && e.__esModule ? () => e.default : () => e;
    return (
      a.d(t, {
        a: t,
      }),
      t
    );
  }),
    (a.d = (e, t) => {
      for (var s in t)
        a.o(t, s) &&
          !a.o(e, s) &&
          Object.defineProperty(e, s, {
            enumerable: !0,
            get: t[s],
          });
    }),
    (a.o = (e, t) => Object.prototype.hasOwnProperty.call(e, t)),
    (() => {
      "use strict";
      a(588);
    })();
})();
