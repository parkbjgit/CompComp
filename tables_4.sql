create database game;
use game;

create table USER(
	USER_ID int auto_increment,
    Name varchar(45) not null,
    PW varchar(45) not null,
    Si varchar(45) not null,
    Gun varchar(45) not null,
    Dong varchar(45) not null,
    constraint PK_USER primary key (USER_ID)
);

create table GAME(
	GAME_ID int,
    Game_Name varchar(45) not null,
    Game_Image varchar(300),
    constraint PK_GAME primary key (GAME_ID)
);

INSERT INTO GAME VALUES
	(001, 'Apex Legend','https://i.namu.wiki/i/ckAuLDpKDPDxV7zCQ1GG1WIoN_4vJXGUai5aDnO32bErD0gcLAs9CX0UW4qVK0x0BcEflmQD_KEXk0foOPaTMKjjFYZ05PT2Bqckk_CprLIcDsEBit4JLly6kwUe3Q5GEedJdNF31yk3RxW-W-P4dw.webp'),
	(002, 'GTA 5','https://i.namu.wiki/i/CJYN3Y0hL-kXJE_GpouKXFBtCQdGaWbOSqCM0gXWFh-CQAXVYPmKk7yrJ1UTyFqnNHf53gWPxQYeHw7UahNU2VaE6sPmCruSzHqhIwUrX33VKDkQ5UXLwsaj_5Fx2RdG8lf8UjLNLEg-FqXfH7FqGQ.webp'),
	(003, 'Lies Of P','https://i.namu.wiki/i/o82aHYbcFSl8dSaj8RgcuE5XOvVDQH6x5nzfINkuBJibw6QHUT14hGny_LLmkEGeD4rNM2hsoISZ8jxAMAepLkKynUSnYVLwklM1vzAvvklmegR5pVuFjgbLvO37_sbqueWYH7BXXqbeqOdV6PB3eg.webp'),
	(004, 'World Of Warcraft','https://i.namu.wiki/i/THDAIs1CDtK4R7Wcg6hjpNmysrni_LILpRWa8DTW6G04l3rzCYODWcV_7w_yCL7E8fpG5W9vOGggldK1mHl4bDEwNNc1QcFWo8Z57AG3j7SMgNZON9RXeaAs4AM_haOgVXx_soV5DQ8d0lDzjKp9jw.webp'),
	(005, 'Black Desert','https://i.namu.wiki/i/PefXfX5aZkKvTRYwxk6sxK6BPGqnZm-9SdpQ0EXb5IYXXKXVls9wsmi4lIWTNxZjiVTOln00VxgnPhqHtiFWYc4GMQ1QvkC_D_Hnv9IpXr-z0A3MxtWJG3ghYg2GSkIH8dbNLOvTIqko6ikGh1iK-w.webp'),
	(006, 'Dungeon And Fighter','https://cdnimage.ebn.co.kr/news/201606/news_1465969027_835971_main1.jpg'),
	(007, 'Diablo 2 Resurrection','https://i.namu.wiki/i/dbl54iGw0JmuLTDFfapAbHLryQnwZ_tkCroXrseekR2OiE9t2z1xu_0wBO4GpL1Qjly_IeZ2NrRiU-C2x_T_vL0KQXdVHsQenl_AZEGffbrGVyHmZdTuxdh_rW5NeMgUSmSAYqZCwVjhzWzw-Y0kNw.webp'),
	(008, 'Diablo 4','https://i.namu.wiki/i/AqWTMJOPUfT5hRcpeakMX2ZPbV166g59DSvTra1jQ5tvdRZ-pLqvuVUI6kkp_5Yh-xhqGCMHAlDf7fSReMzAIaxxy_VYTxKr9KeMlkEq1Wcxq-uetbxSRvXP1KRAr0MVwKdr2x-BshF9cBABQvgv6A.webp'),
	(009, 'Red Dead Redemption 2','https://i.namu.wiki/i/4GJXvSZY0oDDAWlgOoGYaeD6ElmF-q0mH9DNP95ww0BYUd2ETKw5LnnHnNu50uHNdjCEOS4Ya7cVY0XqlH1VhNf6Z3YyZy6eXL71ttHT9E9fs3HGEE_eL4OxlYp5-DqB_Cfbc1_gvPOCiP-gwp9eHA.webp'),
	(010, 'Lost Ark','https://i.namu.wiki/i/-ddX4StU9a2ujll7jKZs5vpQo0jkD-3MT97-qSQmY5SGtEyfbTaOw-EV3eI30AuYAU0JhMWEFhSe5_ax4zPZWjs_cD-1cp3O6BXvLbopizaPyjOGon6E_ca5CVrHLCXpdHmPVMNwG0JbaF8J1BVq8A.webp'),
	(011, 'League Of Legend','https://cdn.pharmnews.com/news/photo/202211/213910_85437_210.png'),
	(012, 'Maple Story','https://img.etnews.com/photonews/2103/1394199_20210319104004_044_0001.jpg'),
	(013, 'Biohazard RE:4','https://i.namu.wiki/i/zCXezrbq4Hv6XZXo3lMQotlFcEusMoP_kPmbBtGyHwG9tYJ0gV4NJQXUrzhb3XuQUVQG5V9YzIUU9dzkKV0HdpnQadR_KWw93EmOt35iUcdOLgTkkedoFw0b9OGPq7yZEVLnKfN362lEJtxgrPYAmA.webp'),
	(014, 'Baldurs Gate 2','https://i.namu.wiki/i/7wvEZtPP6GYvrUNY5mZcUCj0JGONBDFP07AJBc_nFd8zm3gpUOCSEyg6FsNMHZWwK-YTFFlVxWCXx8GOSTomaKLh-6GB52kYF4K8vmVqexcEkVa8QMeycJmTw6OZjjNdOdvXQWn-eL5nUzBTBnva4g.webp'),
	(015, 'Valorant','https://i.namu.wiki/i/WW0XZuIwy_NJlCcdmMfnRa3ifXRWuq6hyfQGEk0Hn4dSG4kpOKWtei8fvPwFPIK7EstTDgJ6g2OP6F1Wtj8ajOpdxg2W3AIzWAtPe3pmHIOL6L1FzTbmDJZ-howT7GCHGAtD7xXrFyAGxc2HyiUu-Q.svg'),
	(016, 'BattleGround','https://i.namu.wiki/i/pWABhsoWDmVp9QRBXdlvimeC1k2t5HPbyOO3usUOsfiVtWZc-DpBwQ3PwwlH29O_hbNUezBfK0NUamuTtSu3HgMthwNDldFuxPVe4-A02DrgYDRoSuMGrm9AdIshlN_8Jl5nkOGrYbsRbXZ7w49FjQ.webp'),
	(017, 'Sudden Attack','https://cdn.gameple.co.kr/news/photo/202004/153525_158036_735.jpg'),
	(018, 'StartCraft','https://i.namu.wiki/i/mtd75EmPjZuvfHw9-9AqhtxDM1WFmGaSYjwoXq2H0dGXKGDR8X0iRih7sdYYkvkcwHrgiCa6_4xmlGK0qXu01xehaOKmJj3rb3NVq4Z_dr3jHnWGNrXCCWMDhpn_F0A-32ExZ_GX46EWUrY_6H3YUA.webp'),
	(019, 'Sims 4','https://i.namu.wiki/i/e-1KuYzLclb8TR8fa6UXkf0zlJrxfSHkLvOZYaDySEg5kmCKxbAigQ7uGff1rl5QxkqkC2eGl7309OXl9njw1xpTEwqXSKClZyxGxt5-ofs5wnMDPVedvRNbgwXQ6esOx5fPSFDEl-aempfFQAHArA.webp'),
	(020, 'Assassin Creed Mirage','https://i.namu.wiki/i/kHwpZdngVIL7F28NiIDre3qha-22yGY0fkU3UJNamiaGgSM56AxgBMN2oLRp2QP2B5LUlvlvnZBIh6HNGG5fqDzn5tJeLrIfPrX1Zr_q56I4KaRkUqcxg4aVfAscY4M1R6ExpccYLXRmhrilvApsNw.webp'),
	(021, 'Elden Ring','https://i.namu.wiki/i/TicoKiTvb3Ce9W1QAIOZBgX1kGpihPXtbGASBVfidDJZyHXsnzY3myU7yegAUDXxgIb7K-0tLp30zgmUCoo4jbPZd2aJB26yWeAY7FaV9ZUXqABpBczXY1sXNCN8ehUBNRg6y4r4e6_7uOL27LzX0w.webp'),
	(022, 'OverWatch 2','https://i.namu.wiki/i/b7hbcV8qrNB99d8GtN2raUSHGopfhrIomb2o3SM_x00bk6VnMM69gaHQneq7XIEpN297yz7_LYASRV8b1uConDEFGMxBVOhcVKgX9CD5-X5bCxqq86BsJ1lNNuXJhuirq9PCeUdN-IxNV4u7eYffaA.webp'),
	(023, 'Genshin Impact','https://i.namu.wiki/i/tMqpqNDiDw_DoqgRTKgX_yI6EFeyv1Wy0bxOGwZR_S572SOLF5lkmPR1eyEh4j85GaB0HGccICj6rUEfLnlKheI0zvNFWZvLrfGYA4MGEWjdMbzFgEGL05vidE1gL60nA3hgrl8hkmWndJMUeIR9ig.webp'),
	(024, 'Eternal Return','https://i.namu.wiki/i/ZJNJ3FNfBnhkO4P2tQvheljYedojX3Vd2I3RIc38CYQh5MR2ILIYr75n9a8u4tF8bvY6H38MTqVU9Xns7tcpToL_KXeJ4OWzf9s6aZst-zfuEWSM4l-Pkoau_vSxmEW8AZLpqE6DL0Hymtvue6WJbw.webp'),
	(025, 'Tekken 7','https://i.namu.wiki/i/TqKRiZ35Vs4xIWvBXb6kTJcISxJrrrwyuZssGjlhgPdq7VgVXllBcGJCI8qOegNHjsr8jDjPjdHGLTYM_VRuMsul4QiaCVnBPZfzr0ZMZy7GtSD7pUbPX5iBklOc7Si6adISUQMAN10jESt6FKIhIw.webp'),
	(026, 'KartRider: Drift','https://i.namu.wiki/i/s9Qj9fBasWbE0PJUAwE7jOGsFrnSpv8vivwuR6qdUKeuHXANW7cR_Ji7hO71f4utOeGTnoeTe5Qp3scQqNv6VfjOK54TJxsxe99tN_EvIIJeNAUqMX1yDOuch8d3Q0He-Cy38H0wYALm5b5k1WMhdA.webp'),
	(027, 'Call of Duty Modern Warfare 2','https://i.namu.wiki/i/P5Gl4MS6xuJqQLeB3G65Y4xQgo8LBN9c_p9oCdWr7hPJFr6VCXcp63gphU9YwJIyURYc1Yhc2-tq0hAheRK2YCRzQjH6qcGXm0Fr_A_WM5oF1KZv9b_aBu8nvuNtktH9-K8TWXwyr5_ZvxyoA0Qu9w.webp'),
	(028, 'Path of Exile','https://i.namu.wiki/i/jEJjdTdGa_XdhRwOzeczD2yTbAkAetCW2Xh7Ifto68d_ACmeFAoRXE75wlHNTOSWTTcWoi3XpMZTpy1yuWvDLrPojXiJJuKytSJZX0OoWYfImDYmaGrT6Di9B9TtIdwHBOdr5Bwsn-gd4zZeggfUwA.webp'),
	(029, 'Forza Horizon 5','https://i.namu.wiki/i/ic3FCqUkvuQ_dmLreIYW19kqv_Q8EvH3pjH8uvemRnTEDcX2fAl4Traa2jDCFarpwUKL33XycwrU8Zi763tfpItaot8czs_EvkhKFM6_qK3FGnATsJl5DSpPJKRPG_jYm06m7JQPL1LEiRbEFZ9ycg.webp'),
	(030, 'FIFA Online 4','https://i.namu.wiki/i/zXNtDlv7hligC_bYKo4gnSP_bOiTU-sC095uYC8pwq7vh_O5p1KuESsiIZGEZl5incXOHpAg9o0bJbThBerwCVpuQ8iP68QQPASxRIqHduDr3D6J2hdTM71VwZAgWL3sCb8x3WpxakcAANUeQ__cUw.webp'),
	(031, 'Hogwarts Legacy','https://i.namu.wiki/i/Wsjx3QLFE9WFG5x2sANoIgf_r_neKI5ivYN8Ep1aDxcdL1YWCzUhh5bVLrhKTV2av7MrcGFSaxSS4Kgnxard1diW4FO0-wYVxCNvtoEhFP73euPocaKAQhoylGkOM9yja0Ugt6LZ6yMyekDvMFTQoA.webp'),
	(032, 'Aion','https://cdn.ftoday.co.kr/news/photo/202303/253020_252195_5332.jpg'),
	(033, 'Lineage','https://www.sisaweek.com/news/photo/202102/142087_135456_1221.jpg'),
	(034, 'Cyphers','https://pub.cyphers.co.kr/images3/art/2022/02/17/1645069757156.jpg'),
	(035, 'Dota 2','https://i.namu.wiki/i/YxUaRYwQk-IbQSLsVb1Sgt6EiagGEjDDh0NZWVpCbbAmswaWQ5_b7FH2Xir0z-LSshm0ArOm01sCJhtTWm088InTD252HspDv6V6ISKufOL9I-uUmUK0XYMSdF6ar-cI77NbN4AY-X5gX3WbNhwBgw.webp'),
	(036, 'Tales Runner','https://i.namu.wiki/i/iHyVhDilboNu7CFWbjSnNBuxcaVzili6QuduK8oBNc3Sji-wM3KX7dkwa8gzl8JhCG3zO3fZla3qDiAU4M5b-IXUWFob-Xk2MMYtEMru3BeuGQ8uFN2xzgApfagmAzjNe_kstUUNQmPHeZVT0XP8gQ.webp'),
	(037, 'Blade And Soul','https://i.namu.wiki/i/s4YpE5w-apMe_165pMOu-c2QQ-W5Nnqj8pD6f_yFn6__DWSqhOP5qN1Ky-llzQg_ppNBG9Al3Dr8y8oDIa3thLZyd9lI_xeCx9R6euxQ3HHaacyxr5SDVMps7JeMRGZRO7oyQ_R0CrSRViEdXszCvg.webp'),
	(038, 'Final Fantasy 14','https://i.namu.wiki/i/BS7DPu7vGNxWdG6_6dBuxomo4Xt1xf96B-nt8-l6SD6MMyG_m7qLSb8h1fLKg87YIW9qxu5TnFXxPiE-PGUr7PWOSnmM4UOBzc5_zBU0AELh4zSimgmbBCnovygT6x_xHyuXnociuEVRncKqflRytw.webp'),
	(039, 'Odin: Valhalla Rising','https://i.namu.wiki/i/R90L8j5rx3ScFu3uqBDditqPj5eGHtWIli85AdDalSzJj2-q_tmzMW1T5j2FYJAU7HqANLDJ6A-I9wQSPaATeuxOZYxMeaCLCiycJWOM4h3Czu7IYLmEF_0UUdY1pv1OoG5KncT_dnWcDkBu9A8oQA.webp'),
	(040, 'Crazy Arcade B&B','https://i.namu.wiki/i/-Es6iKzaCNT8qhsbqs2S9u2yUZ-c33ePdYFpWoa8V8Nl1LOcMQjZgEitH5OFXtAA3vkv9whRwHHVQj3k_Zx8uPxl2SsCjiaBr17vmov5JeDmG5_MUh1Puzn0jFbFyHhhJ1aYG7dqGL5BcqmspQCdeA.webp'),
	(041, 'Mabinogi','https://cdn.digitaltoday.co.kr/news/photo/201110/22280_26496_1846.jpg'),
	(042, 'Special Force','https://i.namu.wiki/i/Gof7erfUnFFrpBO0-59PQUD375TUKj08nE-Haig-FLH1o_qd_myCCR3gotENZijinPC5ngWy-OfrN8-ok17WPBpKFMlCYGUF4sK6KE0cUN5tyHMZNsMYoyLaYJ73tK4N5VTb_qRF-iwet6V_lAGfVw.webp'),
	(043, 'Colossus','https://dimg.donga.com/wps/NEWS/IMAGE/2007/01/31/6997975.1.jpg'),
	(044, 'Minecraft','https://i.namu.wiki/i/7fyPvRd8pYsHeDzDLkHXX356Fmq6UieAvERZOsvaJ1DZJQLG3CQuUj5i8uuEq2RrIZFjSGizfYv-zX8_x9loJyAs4-XQZ4kHR838xkV_muX_Kl6xVnTuIhybTNrzEY-UeyrUK2VrbPmC1Icnyqq0Cw.webp'),
	(045, 'Counter Strike','https://i.namu.wiki/i/3h_AAso2MU9YABnlIXOCQbWSdf8zQYfMpYr_AkL8ntt9F_dsZAvzCGRM4q_uATDanE6Q4YdUR4rT56Kp_OZK2geehdI4a07PfpLiBZ97lhr6CIo6SCLEQHQjwIEkVfPwfO7SiNYU60fztrLr9P0fRw.webp'),
	(046, 'Elsword','https://i.namu.wiki/i/YxNoYQA_XER31SXHdhG7Pmr2LKMSlgBLwpBmU66NQZ6oezCRwOCdgop31U3AxSQKjmnkXSulDyVZMLf4l9D52eIFB_wHB00Fnxtsww6pg1fhyTFKKpZI_TJqo-jstGh4HUTTRaI2KWIkeRc7Qxc4ig.webp'),
	(047, 'Rainbow Six: Siege','https://img2.quasarzone.com/editor/2023/06/23/6ca0acfff3cb925bc8a2503a9105609d.jpg'),
	(048, 'Starfield','https://cdn.gametoc.co.kr/news/photo/202306/73461_228294_120.jpg'),
	(049, 'Heroes of the Storm','https://i.namu.wiki/i/sAXFk2Sgdg3BNR93zYi40bmw3iXtmmP7Na0BQ1lR0hRUT6iBQ7Ddb45GM-UtBnJTvTSS_b4Zxj3sV4X9f0Kco9AmVUzw1mYRVcI2-X5ySnSiiqBIfnS_Xaz8FKCSRaCvxM4OIbn0in4xUAuJZuNk-g.webp'),
	(050, 'Hearthstone','https://i.namu.wiki/i/uuYaHpWpNhiA2UTWm7i9CAO_swgxZMCi0-CL-a3x5fyOn7TXRVhv6ec3WZRo2CYOybOEe0ACZKpwGL3y9mQ3jqz-6zMC7zxFkuvwL-kD8dvu7sUaFp-qK0uBtQ_zY-NE2xlXofLBF-I_4N3hHgxLzg.webp'),
	(051, 'Football Manager 2024','https://yepan.net/data/file/comm_info/thumb/720x0_90/2108765233_jwU1oAnM_fm24_main.jpg'),
	(052, 'Like a Dragon 7','https://i.namu.wiki/i/kWkDIkWCVYZzLPuI8tWuF6WBTYYR1XYBVvj3IGdiFFRa-L-F3ToyctwFSJnuUlFfZ66SLswBfJOzvYeDldo8VOP2zPrSxl55tDhczPeGpEOfx4jzyi6PV4qOzuTzYcSTJSrJmt5U3YCagW8dhMkJAw.webp'),
	(053, 'Sannabi','https://i.namu.wiki/i/52vV9Q4QSADcz3ua37c4QUg952fXECUg5vhruOuaQ_RwMaJlep-9cCt4TdjnviRm5Wcvcp2IcX6xgM3Tcd-NGqUrRjX0TUwGkmPF0vSBXmQ7VPns2rUDT1bDqeXg14B2eEyC6oQgykC1rG6mIW3gow.webp'),
	(054, 'Risk of Rain Returns','https://i.namu.wiki/i/v95uYJElldhxAHx3cWuB0Z2BD6MvA8cNToalPMD_qFAUR9Ls9yAFRLratqaTvZUNH7_Uy0iLpq2YSiS-fUkGp4X0M1k_dPhHPlY41U7FD9_V3owaPFDP0EPLmOiaNjZ9z6FttqCj5pUrySMXPfTOUg.webp'),
	(055, 'EASports FC24','https://cdn.akamai.steamstatic.com/steam/apps/2195250/header.jpg?t=1701266064'),
	(056, 'Latopia','https://i.namu.wiki/i/xwCKO8WyPDaDWTdHw4B370WVFkYO2qr-acrBuFNKP2JdIiy-JqrSGPXF7TJanxrb8lfIGHdufkKfMYluQQgQ_-HTuy4A54cwJnw0R59_rPS-Xi_Syperjbf2hCHw1nA7r_eXXBqJ1v9w592YdZS1mg.webp'),
	(057, 'Crusader Kings','https://cdn.akamai.steamstatic.com/steam/apps/1158310/header.jpg?t=1700678604'),
	(058, 'Cyberpunk 2077','https://i.namu.wiki/i/tqt1cUwA_J9B-sQAj1jXaTEe6q2aYhwR4CQYAopK6rafNadyjbJwOdmDuzINwdIpkyBLfBev9qnYMQwnczLg9tehT19MkYVpd_ijuRovm4GuuD6ZWLwfDcJdUcK7w1KkJBApzDVnK6cXcsCg1JLCNQ.webp'),
	(059, 'My Time at Sandrock','https://i.namu.wiki/i/4Pyf5kBD4aH28shbD8IIAqmK1i8jEtK4OoZtcAs9PoRWRGJ6nhIJ8mmBNxGlsGsDwB4ygWY8HcGic-Wwu9j5DyrUM4W6ya6LtQ0s1pFvA5xHBnfzuD-sf9P1B2kP6u3J5P6DAxTO8Od3HnpQw_VaQw.webp'),
	(060, 'Cities: Skylines 2','https://cdn.akamai.steamstatic.com/steam/apps/949230/header.jpg?t=1701874564'),
	(061, 'Star Ocean The Second Story R','https://cdn.akamai.steamstatic.com/steam/apps/2238900/header.jpg?t=1701874121'),
	(062, 'Mount and Blade 2','https://i.namu.wiki/i/w5H2C7eY_L5BDa-eovaVaEGhRpLaGWsaQhAnoqnMcjtTBCK2GA6_Pgi8PJyuINIpD4Zr-lsbX4-XkZ9tIy17I2APeYSw5VCK-f0LFFMWjo0UtQdzaIoeEOhFFmuTCX-wI3vqSrnw-LXXAP4N9utDVQ.webp'),
	(063, 'Room Escape Simulator','https://cdn.akamai.steamstatic.com/steam/apps/1435790/header.jpg?t=1701771819'),
	(064, 'Project Zomboid','https://cdn.akamai.steamstatic.com/steam/apps/108600/header.jpg?t=1691508011'),
	(065, 'Headbangers','https://i.namu.wiki/i/tByGhqd61XQjfdm-TFvHuusW9yybUOYisa2umPBBoHxp_PuhbYERehmM0YJ5byhUjK0V8MWe89A6AopA0WOadWvX13j782b_8lwUziePuoDifIT1P0Y8InOx4etKZaSxNDICD8PbmyG3G4OwkeAMmQ.webp'),
	(066, 'Party Animals','https://i.namu.wiki/i/5Xm2ho5ydVlm0-cm1FiisQfD7-WHM7XXhak9aTp48rV1INyHxtGXzEFBgF9yBe-NqSliA17whn4aH3faDRB3mYI20T7PAW56K2xarGyevvpnDplC8LSckmzIIiMec8gIC_9_uoch2rHULam_zainmA.webp'),
	(067, 'War Thunder','https://i.namu.wiki/i/6QrrvPHkl7z3qnFmz3IY8qcgGPrEKDhWY4Hm8PqjDm2byiRw8yEsAXTuBbXuTqOkeqV66qiKAvGW0cSe_M2eKPUZIAorA4pXWnD-vtB3nxxOyg5fAtmRlVwLR75QWcV2K5J9V9hgwiyKvX7lG871qw.webp'),
	(068, 'Yu-Gi-Oh Master Duel','https://i.namu.wiki/i/XlFPQ_64jthFL6l0yT1eu90jOb7eqeVotbOUZBlDBkkarPf4kQ7x20lLV0-e5DHyqHLAEH6J5-_SO9yBx0l1yndT1rFcpu7OFlT-PIjCXGdo6_C51O0Ro5t4Ze2XKwx2Dt1vPNnVIba33igNy4rNog.webp'),
	(069, 'Cuisiner','https://cdn.gamemeca.com/gmdb/g001/30/21/gm230603_cs1_sn.jpg'),
	(070, 'Conquerors Blade','https://i.namu.wiki/i/fmSKAYXqkKAgf198D2VCKxTFCfWEwX4e5BOPxhS76tCAKagfqE7i586IiT2zteqShVHTk3nVkSn8PC1TYyk_rxpSECs7XWWQ7JYc8LG4u7WcUyP6hDWk0Vw5weRL2Bqm5hgD065cFxgnQjTzBXsXmQ.webp'),
	(071, 'Warframe','https://i.namu.wiki/i/gOryVxRx0pxwht-G9B31pn8_Xb1kJDPGlK1d9UHNKN51ShmomoXkJqjIJoqyg9FNgZ_y3WG0uSlFDR83BpF68C3Ens9rOZjEbvCbpkSokgQtCl0pAMr5UX922Gj8dp0SGMOEGv0Jh6vjup2cAioRDQ.webp'),
	(072, 'Overcooked 2','https://i.namu.wiki/i/pqwcQdaIJCsoIYnGfda8jR-lS_uRxrwqid6D5IMzeLFAPCDV_eMDiZEqozMdIk7KlAVTf7mc1yLXT-2aXFjgFEWOJ1ySEGUK8WULJx7__5JuboIlbd6Pek9RU9ltMpbgR52kOrZN2eNUsnofWXYo9Q.webp'),
	(073, 'SoulWalker','https://i.namu.wiki/i/vUaCWgxkoirl4rEoibVq0MmLWu3-xAoiycY8Plh0gvedEeW3P7ucf7NHlUKnNOX0n2dSaFRaOoqLEzyjpjRvrirUygsWtEJgoZRdpSSE5-Gy3G0qCcnnvQoyELOEAuUYot8PYbw1em_9FLXB12nZYw.webp'),
	(074, 'Deep Rock Galactic','https://i.namu.wiki/i/hemfvlv6lqHNEHWMjeva7miWTICHPpOA_L_3klDCo2ypqG0YjAiuA7UY5D2vS4BjC0psvX-QTqK3rHvk-lIJBG4c9WTND6G3gtBq3cD5ZbTLkWFpQa6bJWY8iJ6OEKk1P6s8Z654ynpV7WDU9PdP3Q.webp'),
	(075, 'Far Cry 5','https://i.namu.wiki/i/3I0h2JN4LnECDr5ylXilzI942rjH-YHfIgGkU1HTlCMUSEYQ1OGFZlvWfysrnmUBSnuXu0LpiJbTSFZslSFu8xvpEi2GATwcVpzietjnltX1HxS106jCUh68I1eQHEfOeLgqHa40HGVoCq4EewDZXg.webp'),
	(076, 'Zombie Builder Defense 2','https://cdn.akamai.steamstatic.com/steam/apps/1638950/header.jpg?t=1701641518'),
	(077, 'Dave the Diver','https://i.namu.wiki/i/k1oN1EtYZbCL9LJyBLakCUaPoIaaGliGiGtIgjkY1GJfCUqyeOy0wCKQT3L1XEi826hvqhXozZxUPs-OS31G9Xxwed7viUfzNHK1kM46lKDwuEi06jsGFa1CX857q_5--3ZNUB_DX0mUwYoPI-ZuBA.webp'),
	(078, 'Stardew Valley','https://i.namu.wiki/i/GKKXNMyW14Gd9MvlKuN6DEdXNCP5lP8ZTKqAfEdNNWBlRgewMpclhvVfZprP2_W804osnwvrdakunTS9G6RV4_XriP5wO7srt8KE8ecBwJ8n5nCjhHZ2XdfEkJX7Z71TCbX50BWhM9Pa1hB2W0FdMw.webp'),
	(079, 'EZ2ON Reboot:R','https://i.namu.wiki/i/tT-NUaKRk2CHi0mKv66sFSjUSZ1Y1RQDGAGSZzYbyh1rBhyNI2PGO0JE-eKDeuB7MmLv04A7Ch-slB2i3IJ4cvCX6FymVBcyeh3htdGI8h8xLPDmEjvn7vok72dY1bAh3NMnxZOuGTId4DDqqTgrLQ.webp'),			
	(080, 'Escape the Backrooms','https://search.pstatic.net/sunny/?src=https%3A%2F%2Fs.pacn.ws%2F1%2Fp%2F14j%2Fescape-the-backrooms-729543.8.jpg%3Fv%3Drls2e9&type=a340'),
	(081, 'Age of Wonders 4','https://search.pstatic.net/sunny/?src=https%3A%2F%2Fassets-prd.ignimgs.com%2F2023%2F01%2F31%2Fage4-1675193118812.jpg&type=sc960_832'),
	(082, 'Rust','https://search.pstatic.net/sunny/?src=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Fac%2F17%2F43%2Fac1743ebe31f563e0b4c7e0fce23afcc.png&type=a340'),
	(083, 'Borderlands 3','https://search.pstatic.net/sunny/?src=https%3A%2F%2Fm.media-amazon.com%2Fimages%2FM%2FMV5BNzJlYzhlY2EtNDE5ZC00Mjk2LWExYzQtNTE5MjAxNWNjODg5XkEyXkFqcGdeQXVyMTk2OTAzNTI%40._V1_FMjpg_UX1000_.jpg&type=a340'),
	(084, 'Persona 5 Tactica','https://i.namu.wiki/i/lZaPgh4pk_r7-jCJdC0FQjDYKtkjU5-56CygIzE_CwRbR9o3QALXC0bUbgePSvrk5uZZMAGQuzsHmxpdStLmib4lvt_3XSCPQu9x1A6w12fR5xBzzIrHBZQIK6FMIb3NfmdhNgZ-NCQDXKs9Qg_M5Q.webp'),
	(085, 'Raft','https://search.pstatic.net/common/?src=http%3A%2F%2Fshop1.phinf.naver.net%2F20230917_46%2F1694938784658EKc7y_JPEG%2F2286514838971130_411956793.jpg&type=sc960_832'),
	(086, 'Dead by Daylight','https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAyMjA0MTVfMjE1%2FMDAxNjUwMDE1MzY3ODU0.JpOQkqzi3ajd2vTZlbPqoZtWFUWzvoNI3Ha3vb8jEH0g.W8Le9bSEDvAIL05eX8T0_KoN720BkEKAqxpn6SZiVykg.JPEG.kimjhwgd%2F41Cj7RoXl5L.jpg&type=a340'),
	(087, 'Watch Dogs 2','https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAxODAyMjVfMTA0%2FMDAxNTE5NDg3ODYyNjYy.lQX9ZBi_NsA1c55OnPvQStNJThLOfGTqgDbRt2Ecp3og.-7R3aHvTSXxvxpGPF0MC1v3eaa-Ufjar9wqi8rJ8lagg.JPEG.bigbus0222%2FPS4_BFCD%253FB5B62.jpg&type=a340'),
	(088, 'Warhammer 40000: Dark Tides','https://search.pstatic.net/sunny/?src=https%3A%2F%2Fi.pinimg.com%2Foriginals%2Fe0%2Fb4%2F89%2Fe0b489c8d39b35aa47d49191e8fd773f.jpg&type=a340'),
	(089, 'Eve Online','https://search.pstatic.net/sunny/?src=https%3A%2F%2Fkbimages1-a.akamaihd.net%2Fc280ecde-ea2f-4d0b-9c1c-e02291afad52%2F1200%2F1200%2FFalse%2Feve-online-windows-pc-unofficial-game-guide-1.jpg&type=a340'),
	(090, 'Chant of Senar','https://i.namu.wiki/i/X-uEvD1j2hG8_IYU2Z_G6lc9AvARUJ0EFX5twf-uZ1CjLrfdyaYBpFCvA5BMTWHSHLpgRUsk4STWJr9KPm9pioSO0fGb8M6xDFXb5uZU_cBWfVCCRA7lBno97wTUQ1ZUorCkXA9L79zDNcBXv-gV9g.webp'),
	(091, 'Armored Core 4','https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2F20091209_62%2Fjeremy38_1260311457657gj0oP_jpg%2Farmoredcore4anser_jeremy38.jpg&type=a340'),
    (092, 'Sons Of The Forest','https://i.namu.wiki/i/2wmgC1Cn1mHKSteGCOoi3Y8wWHUDcXvB1zvzzgVlTIQqjrnZkiOsBamUjZaHKADbsgu-LUJxUvsPCHdsnJ2om8QKwygPUNuKuZczkSHUciqpMZTHvC3-rPFRdN10MNszdfiDbq6fLQS-lh034vdMMw.webp'),
	(093, 'Monster Hunter: World','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxYjXDzi74zI7NC6UCKxvl646cU8wLbwFuVA&usqp=CAU'),
	(094, 'Destiny Guardians','https://search.pstatic.net/common/?src=http%3A%2F%2Fblogfiles.naver.net%2FMjAyMjExMTNfMTU1%2FMDAxNjY4MzE3NzcyOTAx.WISdYe2O5OC9heWNu7MTkZDwij66S56cBKZSfOBTLmkg.cicQeUP3VDfxi-QIwTHyUpa2dYrni8gulc1A1AZubtUg.JPEG.joker264%2F221629_P2_%25C2%25F7%25BC%25AE%25B9%25CE_M2.jpg&type=a340'),
	(095, 'Limbus Company','https://static-cdn.jtvnw.net/ttv-boxart/1280007947_IGDB-272x380.jpg'),
	(096, 'Ark:Survival','https://store-images.s-microsoft.com/image/apps.52261.14036931078975578.35527dd4-bd1c-43d9-90ff-3a801a47df6a.d5645ab8-82fd-46e0-b961-9fc179d12fe4'),
	(097, 'Dying Light','https://upload.wikimedia.org/wikipedia/en/thumb/c/c0/Dying_Light_cover.jpg/220px-Dying_Light_cover.jpg'),
	(098, 'Left 4 Dead 2','https://upload.wikimedia.org/wikipedia/en/b/ba/Left4Dead2.jpg'),
	(099, 'Marvel Spider-Man Remastered','https://i.namu.wiki/i/49d1dAuQVPoh7ov_NX5Qt-cQg7k793j7rBiD4qrdc_GKSp4vf8MeJ9cs2PqxS7YElRmQEvyvsrfpFXMSJiScCLGO972GvRHvc7o441pH-LqpIw1ljwh0dlopy1OuiCuSwrH0htMP9wpXSoz9gxuQkg.webp'),
	(100, 'It Takes Two','https://i.namu.wiki/i/8DazcZlNuqyn_Uj7C_DAQZoXmC0heBQyGZ_FwpmgdgDad70XmYV74RcbjLfbTElDpR-8QC4j1w_bCCdQmwKbQgw68LNirQRUBxviycZRUFsUc3rodAbx2xKGK_pf_D45BJxPe6mxHIJDKJzSZ3lSHw.webp');

create table RECOMMENDATION(
	RECOMM_No int,
    USER_ID int,
    CPU_Model varchar(45) not null,
    RAM_Model varchar(45) not null,
    GPU_Model varchar(45) not null,
    Price double,
    constraint PK_RECOMM primary key (RECOMM_No),
    constraint FK_RECOMM_USER foreign key (USER_ID) references USER (USER_ID)
);

create table CPU(
	CPU_Model varchar(45),
    Score int not null,
    Price double not null,
    constraint PK_CPU primary key (CPU_Model)
);

insert into CPU values
	('Ryzen 5 CPU', 9089, 50.94),
    ('Intel Core i5 3470', 4673, 34.99),
	('AMD Ryzen 3 1200', 6322, 50.23),
	('AMD Ryzen Zen 2', 12661, 146.64),
    ('Intel Core i5 12400F', 19599, 149.99),
    ('Intel Core i5 9600K', 10744, 159.99),
    ('Intel Core i5 4670K', 5549, 93.00),
    ('Intel Core i7 4770K', 7123, 96.89),
    ('Intel Core i5 3300', 8684, 81.23),
    ('Intel Core i3 12100', 14250, 138.00),
    ('Intel Core i7 8700', 13691, 250.00),
    ('Intel Core i3 4150', 3385, 21.29),
    ('Intel Core i5 6600K', 6333, 65.99),
    ('Intel Core i7 8700K', 13691, 250.00),
    ('Intel Core i5 14600K', 39313, 319.00),
    ('Intel Core i5 12400', 19462, 192.00),
    ('Intel Core i5 12400K', 19599, 149.99),
    ('Intel Core i5 4690', 5680, 63.47),
    ('Intel Core i5 8400K', 9250, 142.29),
    ('Intel Core i5 2550K', 4099, 50.76),
    ('Intel Core i5 3570', 4956, 47.97),
    ('Intel Core i5 7760', 3204, 23.43),
    ('Intel Core i5 8500K', 2484, 203.00),
    ('Intel Core i5 7500K', 6027, 82.18),
    ('Intel Core i5 520M', 1720, 28.02),
    ('Intel Core i5 11400K', 17121, 119.99),
    ('Intel Core i3 4100', 2504, 218.57),
    ('Intel Core i3 4100M', 2504, 218.57),
    ('Intel Core i3 4100K', 2504, 218.57),
    ('Intel Core 2 Duo E6600', 940, 188.08),
    ('Intel Core i5 2500K', 4109, 45.48),
    ('Intel Core i5 10600K', 14366, 175.99),
    ('Intel Core i7 4790', 7261, 84.32),
    ('Intel Core i5 2400', 3855, 41.00),
    ('Intel Core i7 6700', 7251, 199.99),
    ('Intel Core i7 12700', 34736, 409.00),
    ('Intel Core i5 12600K', 27794, 199.99),
    ('Intel Core i5 3330', 4085, 99.92),
    ('Intel Core i5 7200U', 3394, 499.00),
    ('Intel Core i5 2300', 3406, 21.99),
    ('Intel Core i5 9400F', 9500, 149.99),
    ('Intel Core i7 9700', 14518, 260.53),
    ('Intel Core i5 650', 5635, 84.11),
    ('Intel Core i5 760', 6814, 98.00),
    ('Intel Core i7 4770', 7123, 96.89),
    ('Intel Core i7 950', 3198, 249.00),
    ('Intel Core i3 530', 1493, 50.00),
    ('Intel Core i7 9700K', 14518, 260.53),
    ('Intel Core i7 4790K', 8063, 112.96),
    ('Intel Core i5 6600', 6333, 65.99),
	('Intel Core i3 4170', 3586, 25.92),
	('Intel Core i7 7700', 7574, 144.69),
	('Intel Core i3 6100', 4155, 107.5),
	('Intel Core i7 3770', 6465, 105.0),
	('Intel Core i5 10600', 14366, 175.99),
	('Intel Core i5 4670', 5549, 93.0),
	('Intel Core i5 3570K', 4956, 47.97);
    
create table RAM(
	RAM_Model varchar(45),
    GB int not null,
    Score int not null,
    Price double not null,
    constraint PK_RAM primary key (RAM_Model)
);

insert into RAM values
	('SAMSUNG DDR3-1333 2GB', 2, 21333 ,11.80),
	('SAMSUNG DDR3-1600 2GB', 2, 21600 ,17.90),
	('IMATION DDR4-2666 4GB', 4, 42666, 14.00),
	('SAMSUNG DDR4-3200 4GB', 4, 43200, 15.39),
	('TAMMUZ DDR4-2400 8GB', 8, 82400, 21.19),
	('PNY DDR4-2666 8GB', 8, 82666, 22.02),
	('SAMSUNG DDR4-2933 8GB', 8, 82933, 29.90),
	('GEIL DDR4-3200 8GB', 8, 83200, 40.40),
	('MICRON DDR5-4800 8GB', 8, 84800, 40.50),
	('TAMMUZ DDR4-2666 16GB', 16, 162666, 34.98),
	('MICRON DDR4-3200 16GB', 16, 163200, 44.82),
	('PATRIOT DDR4-3600 16GB', 16, 163600, 49.06),
	('SAMSUNG DDR5-4800 16GB', 16, 164800, 52.90),
	('SKHYNIX DDR5-5600 16GB', 16, 165600, 78.41),
	('PATRIOT DDR4-2666 32GB', 32, 322666, 76.99),
    ('IMATION DDR4-3200 32GB', 32, 323200, 86.99),
	('TEAMGROUP DDR5-4800 32GB', 32, 324800, 101.37),
    ('TEAMGROUP DDR5-5600 32GB', 32, 325600, 104.81);

create table GPU(
	GPU_Model varchar(45),
    Score int not null,
    Price double not null,
    constraint PK_GPU primary key (GPU_Model)
);

insert into GPU values
	('GeForce GT 1030', 2485, 112.99),
	('GeForce RTX 4090', 39081, 1599.00),
    ('GeForce RTX 4080', 34939, 1099.99),
    ('GeForce RTX 4070 TI', 31692, 779.99),
    ('GeForce RTX 3090 TI', 29862, 1925.00),
    ('Radeon RX 7900 XT', 29122, 769.99),
    ('GeForce RTX 3080 TI', 27406, 1143.99),
    ('Radeon RX 6900 XT', 26987, 1100.99),
    ('GeForce RTX 3090', 26963, 1815.99),
    ('GeForce RTX 4070', 26954, 589.99),
    ('GeForce RTX 3080', 25402, 879.99),
    ('Radeon RX 6800 XT', 25165, 529.99),
    ('GeForce RTX 3070 TI', 23790, 405.99),
    ('GeForce RTX 3070', 22492, 447.00),
    ('Radeon RX 6800', 22485, 274.99),
    ('GeForce RTX 4060 TI', 22465, 381.25),
    ('Radeon RX 6750 XT', 21239, 359.99),
    ('GeForce RTX 3060 TI', 20614, 334.99),
    ('Radeon RX 6700 XT', 19889, 329.99),
    ('GeForce RTX 4060', 19852, 291.35),
    ('GeForce RTX 2070 SUPER', 18255, 497.95),
    ('Radeon RX 6650 XT', 17610, 249.99),
    ('GeForce RTX 3060', 17168, 254.99),
    ('Radeon RX 7600', 17110, 257.99),
    ('Radeon RX 5700 XT', 16890, 459.99),
    ('GeForce RTX 2060 SUPER', 16583, 371.39),
    ('Radeon RX 6600 XT', 16467, 349.99),
    ('GeForce RTX 2070', 16173, 269.99),
    ('GeForce GTX 970', 9642, 237.99),
    ('GeForce GTX 660', 3994, 167.95),
    ('GeForce GTX 1660', 11725, 287.23),
    ('GeForce GTX 1050 TI', 6299, 199.99),
    ('GeForce GTX 1060', 10072, 279.99),
    ('GeForce GTX 1050', 5044, 239.99),
    ('GeForce GTX 560', 2711, 205.00),
    ('GeForce 9600 GT', 491, 64.99),
    ('GeForce GTX 1070', 13506, 488.09),
    ('GeForce GT 730', 830, 109.99),
    ('GeForce 8800 GT', 493, 69.99),
    ('GeForce GTX 650', 1753, 109.98),
    ('GeForce GTX 1660 TI', 12959, 249.21),
    ('GeForce GTX 780 TI', 9468, 339.99),
    ('GeForce GTX 460', 2253, 89.99),
    ('GeForce GTX 1080 TI', 18534, 483.82),
    ('GeForce GTX 560 TI', 3029, 129.99),
    ('GeForce 8600 GT', 116, 196.00),
    ('GeForce GTX 450', 16.44, 79.99),
    ('GeForce GTX 760', 4778, 149.00),
    ('GeForce GTX 260', 1231, 79.99),
    ('GeForce 8600', 1957, 196.00),
    ('GeForce GTX 960', 6034, 172.00),
    ('GeForce RTX 2080', 18808, 800.61),
    ('GeForce RTX 2060', 14111, 199.99),
    ('GeForce GT 710', 630, 249.99),
    ('GeForce GTX 1650', 7856, 139.99),
    ('GeForce GTX 650 TI', 2535, 93.05),
    ('GeForce GT 8800', 493, 69.99),
    ('GeForce GTX 750 TI', 3900, 88.11),
    ('GeForce GTX 1070 TI', 14711, 569.99),
    ('GeForce GTX 980', 11127, 247.35),
    ('GeForce GTX 780', 8020, 279.99),
    ('GeForce 7600 GT', 201, 199.00),
    ('내장GPU만으로 가능', 0, 0);

create table ESTIMATE(
	ESTIMATE_No int,
    USER_ID int,
    CPU_Model varchar(45) not null,
    RAM_Model varchar(45) not null,
    GPU_Model varchar(45) not null,
    Price double,
    constraint PK_ESTIMATE primary key (ESTIMATE_No, USER_ID),
    constraint FK_ESTIMATE_USER foreign key (USER_ID) references USER (USER_ID),
    constraint FK_ESTIMATE_CPU foreign key (CPU_Model) references CPU (CPU_Model),
    constraint FK_ESTIMATE_RAM foreign key (RAM_Model) references RAM (RAM_Model),
    constraint FK_ESTIMATE_GPU foreign key (GPU_Model) references GPU (GPU_Model)
);
create table GAMESPEC(
	SPEC_ID int,
    GAME_ID int,
    OS varchar(45) not null,
    HDD int not null,
    CPU_Model varchar(45) not null,
    RAM_GB varchar(45) not null,
    GPU_Model varchar(45) not null,
    constraint PK_SPEC primary key (SPEC_ID),
    constraint FK_SPEC_GAME foreign key (GAME_ID) references GAME (GAME_ID)
);

INSERT INTO GAMESPEC VALUES
	(001, 001, '64-bit Windows 7', 56, 'Ryzen 5 CPU', 8, 'Geforce GTX 970'),
	(002, 002, '64-bit Windows 8', 72, 'Intel Core i5 3470', 8, 'Geforce GTX 660'),
	(003, 003, '64-bit Windows 10', 50, 'AMD Ryzen 3 1200', 16, 'Geforce GTX 1660'),
	(004, 004, '64-bit Windows 10', 128, 'AMD Ryzen Zen 2', 16, 'Radeon RX 6700 XT'),
	(005, 005, '64-bit Windows 7', 27, 'Intel Core i5 12400', 8, 'Geforce GTX 970'),
	(006, 006, '64-bit Windows 10', 40, 'Intel Core i5 3470', 16, 'Geforce GTX 1050 TI'),
	(007, 007, '64-bit Windows 10', 30, 'Intel Core i5 9600K', 16, 'Geforce GTX 1060'),
	(008, 008, '64-bit Windows 10', 90, 'Intel Core i5 4670', 16, 'Geforce GTX 970'),
	(009, 009, '64-bit Windows 10', 150, 'Intel Core i7 4770K', 16, 'Geforce GTX 1060'),
	(010, 010, '64-bit Windows 10', 50, 'Intel Core i5 12400', 16, 'Geforce GTX 1050'),
	(011, 011, '64-bit Windows 10', 16, 'Intel Core i5 3300', 4, 'Geforce GTX 560'),
	(012, 012, '64-bit Windows 7', 20, 'Intel Core i3 12100', 4, 'Geforce 9600 GT'),
	(013, 013, '64-bit Windows 10', 53, 'Intel Core i7 8700', 16, 'Geforce GTX 1070'),
	(014, 014, '64-bit Windows 10', 70, 'Intel Core i7 4770K', 16, 'Geforce GTX 1060'),
	(015, 015, '64-bit Windows 10', 20, 'Intel Core i3 4150', 4, 'Geforce GT 730'),
	(016, 016, '64-bit Windows 7', 30, 'Intel Core i5 6600K', 16, 'Geforce GTX 1060'),
	(017, 017, '64-bit Windows 7', 20, 'Intel Core i3 12100', 4, 'Geforce 9600 GT'),
	(018, 018, '64-bit Windows 10', 8, 'Intel Core i3 12100', 4, 'Geforce 8800 GT'),
	(019, 019, '64-bit Windows 10', 51, 'Intel Core i5 12400', 8, 'Geforce GTX 650'),
	(020, 020, '64-bit Windows 10', 40, 'Intel Core i7 8700K', 16, 'Geforce GTX 1660 TI'),
	(021, 021, '64-bit Windows 10', 60, 'Intel Core i7 8700K', 16, 'Geforce GTX 1070'),
	(022, 022, '64-bit Windows 10', 50, 'Intel Core i5 14600K', 8, 'Geforce GTX 1060'),
	(023, 023, '64-bit Windows 7', 30, 'Intel Core i5 12400', 16, 'Geforce GTX 1060'),
	(024, 024, '64-bit Windows 10', 5, 'Intel Core i5 6600K', 8, 'Geforce GTX 1060'),
	(025, 025, '64-bit Windows 7', 60, 'Intel Core i5 4690', 8, 'Geforce GTX 1060'),
	(026, 026, '64-bit Windows 10', 30, 'Intel Core i5 12400', 8, 'Geforce GTX 780 TI'),
	(027, 027, '64-bit Windows 10', 125, 'Intel Core i5 6600K', 16, 'Geforce GTX 1060'),
	(028, 028, '64-bit Windows 7', 30, 'Intel Core i5 12400', 8, 'Geforce GTX 1050 TI'),
	(029, 029, '64-bit Windows 10', 110, 'Intel Core i5 8400K', 16, 'Geforce GTX 1070'),
	(030, 030, '64-bit Windows 7', 40, 'Intel Core i5 2550K', 8, 'Geforce GTX 460'),
	(031, 031, '64-bit Windows 10', 85, 'Intel Core i7 8700K', 16, 'Geforce GTX 1080 TI'),
	(032, 032, '64-bit Windows 10', 30, 'Intel Core i5 2550K', 4, 'Geforce GTX 260'),
	(033, 033, '64-bit Windows 7', 30, 'Intel Core i5 3470', 8, 'Geforce GTX 1050 TI'),
	(034, 034, '64-bit Windows 10', 10, 'Intel Core i5 3570', 8, 'Geforce GTX 560 TI'),
	(035, 035, '64-bit Windows 7', 15, 'Intel Core i5 7760', 4, 'Geforce 8600 GT'),
	(036, 036, '64-bit Windows 10', 10, 'Intel Core i5 8500K', 8, 'Geforce GTX 450'),
	(037, 037, '64-bit Windows 10', 22, 'Intel Core i5 7500K', 16, 'Geforce GTX 1060'),
	(038, 038, '64-bit Windows 10', 80, 'Intel Core i5 520M', 8, 'Geforce GTX 970'),
	(039, 039, '64-bit Windows 10', 30, 'Intel Core i5 11400K', 8, 'Geforce GTX 970'),
	(040, 040, '64-bit Windows 7', 5, 'Intel Core i3 4100', 4, '내장GPU만으로 가능'),
	(041, 041, '64-bit Windows 7', 10, 'Intel Core i3 4100', 4, 'Geforce 8600 GT'),
	(042, 042, '64-bit Windows 10', 15, 'Intel Core i3 4100', 8, 'Geforce GTX 760'),
	(043, 043, '64-bit Windows 10', 10, 'Intel Core i3 4100', 4, 'Geforce GTX 260'),
	(044, 044, '64-bit Windows 10', 4, 'Intel Core i5 4690', 4, 'Geforce GTX 780 TI'),
	(045, 045, '64-bit Windows 10', 15, 'Intel Core 2 Duo E6600', 2, 'Geforce 8600'),
	(046, 046, '64-bit Windows 10', 20, 'Intel Core i5 4690', 8, 'Geforce GTX 1050'),
	(047, 047, '64-bit Windows 10', 60, 'Intel Core i5 2500K', 8, 'Geforce GTX 960'),
	(048, 048, '64-bit Windows 10', 125, 'Intel Core i5 10600', 16, 'Geforce RTX 2080'),
	(049, 049, '64-bit Windows 10', 20, 'Intel Core i5 2500K', 4, 'Geforce GTX 650'),
	(050, 050, '64-bit Windows 10', 5, 'Intel Core 2 Duo E6600', 4, 'Geforce 8800 GT'),
	(051, 051, '64-bit Windows 10', 7, 'Intel Core 2 Duo E6600', 4, 'Geforce 9600 GT'),
	(052, 052, '64-bit Windows 10', 98, 'Intel Core i7 4790', 16, 'Geforce RTX 2060'),
	(053, 053, '64-bit Windows 10', 2, 'Intel Core 2 Duo E6600', 8, 'Geforce GTX 460'),
	(054, 054, '64-bit Windows 10', 1, 'Intel Core i5 2400', 4, 'Geforce GT 710'),
	(055, 055, '64-bit Windows 10', 100, 'Intel Core i7 6700', 16, 'Geforce GTX 1660'),
	(056, 056, '64-bit Windows 10', 2, 'Intel Core 2 Duo E6600', 8, 'Geforce GT 710'),
	(057, 057, '64-bit Windows 10', 8, 'Intel Core i5 4670', 8, 'Geforce GTX 1650'),
	(058, 058, '64-bit Windows 10', 70, 'Intel Core i7 12700', 16, 'Geforce RTX 2060'),
	(059, 059, '64-bit Windows 10', 50, 'Intel Core i5 4670', 8, 'Geforce GTX 1060'),
	(060, 060, '64-bit Windows 10', 60, 'Intel Core i5 12600K', 16, 'Geforce RTX 3080'),
	(061, 061, '64-bit Windows 10', 20, 'Intel Core i5 3330', 8, 'Geforce GTX 1650'),
	(062, 062, '64-bit Windows 10', 60, 'Intel Core i5 9600K', 8, 'Geforce GTX 1060'),
	(063, 063, '64-bit Windows 10', 19, 'Intel Core 2 Duo E6600', 16, 'Geforce GTX 1060'),
	(064, 064, '64-bit Windows 10', 4, 'Intel Core i5 7200U', 8, 'Geforce GT 710'),
	(065, 065, '64-bit Windows 10', 2, 'Intel Core i5 2300', 8, 'Geforce GTX 650 TI'),
	(066, 066, '64-bit Windows 10', 8, 'Intel Core i5 7500K', 16, 'Geforce GTX 1060'),
	(067, 067, '64-bit Windows 10', 95, 'Intel Core i5 7500K', 16, 'Geforce GTX 1060'),
	(068, 068, '64-bit Windows 10', 16, 'Intel Core i5 9400F', 8, 'Geforce GTX 1650'),
	(069, 069, '64-bit Windows 10', 7, 'Intel Core i5 6600K', 16, 'Geforce GTX 960'),
	(070, 070, '64-bit Windows 10', 60, 'Intel Core i7 9700K', 16, 'Geforce GTX 1660 TI'),
	(071, 071, '64-bit Windows 7', 35, 'Intel Core 2 Duo E6600', 4, 'Geforce 8800 GT'),
	(072, 072, '64-bit Windows 7', 3, 'Intel Core i5 650', 4, 'Geforce GTX 650'),
	(073, 073, '64-bit Windows 10', 20, 'Intel Core i5 760', 8, 'Geforce GTX 660'),
	(074, 074, '64-bit Windows 10', 3, 'Intel Core i5 7200U', 8, 'Geforce GTX 970'),
	(075, 075, '64-bit Windows 10', 40, 'Intel Core i7 4770', 8, 'Geforce GTX 970'),
	(076, 076, '64-bit Windows 10', 2, 'Intel Core i5 6600K', 8, 'Geforce GTX 1060'),
	(077, 077, '64-bit Windows 10', 10, 'Intel Core i7 950', 16, 'Geforce GTX 750 TI'),
	(078, 078, '64-bit Windows 7', 1, 'Intel Core 2 Duo E6600', 2, 'Geforce GTX 970'),
	(079, 079, '64-bit Windows 10', 35, 'Intel Core i3 530', 8, 'Geforce GTX 970'),
	(080, 080, '64-bit Windows 10', 10, 'Intel Core i3 530', 8, 'Geforce GTX 650'),
	(081, 081, '64-bit Windows 10', 20, 'Intel Core i7 9700K', 16, 'Geforce GTX 1070 TI'),
	(082, 082, '64-bit Windows 10', 25, 'Intel Core i7 4790', 16, 'Geforce GTX 980'),
	(083, 083, '64-bit Windows 10', 75, 'Intel Core i7 4770', 16, 'Geforce GTX 1060'),
	(084, 084, '64-bit Windows 10', 20, 'Intel Core i5 2400', 8, 'Geforce GTX 650'),
	(085, 085, '64-bit Windows 7', 10, 'Intel Core i5 6600K', 8, 'Geforce GTX 1050'),
	(086, 086, '64-bit Windows 10', 50, 'Intel Core i3 4170', 8, 'Geforce GTX 760'),
	(087, 087, '64-bit Windows 10', 27, 'Intel Core i5 3470', 8, 'Geforce GTX 780'),
	(088, 088, '64-bit Windows 10', 50, 'Intel Core i7 9700K', 16, 'Geforce RTX 3060'),
	(089, 089, '64-bit Windows 10', 23, 'Intel Core i7 7700', 16, 'Geforce GTX 1060'),
	(090, 090, '64-bit Windows 10', 1, 'Intel Core i3 6100', 8, 'Geforce GTX 460'),
	(091, 091, '64-bit Windows 10', 60, 'Intel Core i7 7700', 16, 'Geforce GTX 1060'),
	(092, 092, '64-bit Windows 10', 20, 'Intel Core i7 8700K', 16, 'Geforce GTX 1080 TI'),
	(093, 093, '64-bit Windows 10', 52, 'Intel Core i7 3770', 8, 'Geforce GTX 1060'),
	(094, 094, '64-bit Windows 10', 105, 'Intel Core i5 2400', 8, 'Geforce GTX 970'),
	(095, 095, '64-bit Windows 10', 10, 'Intel Core i3 6100', 8, 'Geforce GT 1030'),
	(096, 096, '64-bit Windows 10', 70, 'Intel Core i5 10600', 32, 'Geforce RTX 3080'),
	(097, 097, '64-bit Windows 8', 40, 'Intel Core i5 4670', 8, 'Geforce GTX 780'),
	(098, 098, '64-bit Windows 10', 13, 'Intel Core 2 Duo E6600', 2, 'Geforce 7600 GT'),
	(099, 099, '64-bit Windows 10', 75, 'Intel Core i5 4670', 16, 'Geforce GTX 1060'),
	(100, 100, '64-bit Windows 10', 50, 'Intel Core i5 3570', 16, 'Geforce GTX 980');

create table SELECTS(
	USER_ID int,
    GAME_ID int,
    constraint PK_SELECT primary key (USER_ID, GAME_ID),
    constraint FK_SELECT_USER foreign key (USER_ID) references USER (USER_ID),
    constraint FK_SELECT_GAME foreign key (GAME_ID) references  GAME (GAME_ID)
);

create table CONNECTS(
	GAME_ID int,
    ESTIMATE_No int,
    constraint PK_CONNECTS primary key (GAME_ID, ESTIMATE_No),
    constraint FK_CONNECTS_GAME foreign key (GAME_ID) references GAME (GAME_ID),
    constraint FK_CONNECTS_ESTIMATE foreign key (ESTIMATE_No) references ESTIMATE (ESTIMATE_No)
);

create table GAME_GENRE(
	GAME_ID int,
    Genre varchar(45) not null,
    constraint PK_GENRE primary key (GAME_ID, Genre),
    constraint FK_GENRE_GAME foreign key (GAME_ID) references GAME (GAME_ID)
);

INSERT INTO GAME_GENRE VALUES
	(001, 'FPS'),
	(001, '베틀로얄'),
	(001, '히어로 슈팅 게임'),
	(002, '오픈월드'),
	(002, '액션'),
	(002, '다크판타지'),
	(003, '스팀펑크'),
	(003, '액션'),
	(003, 'RPG'),
	(004, 'MMORPG'),
	(005, 'MMORPG'),
	(006, 'MMORPG'),
	(006, '액션'),
	(007, '다크판타지'),
	(007, 'ARPG'),
	(008, '오픈월드'),
	(008, 'ARPG'),
	(009, '오픈월드'),
	(009, '액션'),
	(009, '어드벤쳐'),
	(009, '서부'),
	(010, 'MMORPG'),
	(011, 'MOBA'),
	(011, 'AOS'),
	(012, '2D'),
	(012, '횡스크롤'),
	(012, 'ARPG'),
	(013, '액션'),
	(013, '어드벤처'),
	(013, '서바이벌'),
	(013, '호러'),
	(014, 'RPG'),
	(015, '액션'),
	(015, '히어로'),
	(015, '슈팅'),
	(016, '배틀로얄'),
	(016, '액션'),
	(016, '서바이벌'),
	(017, 'FPS'),
	(018, 'RTS'),
	(019, '인생'),
	(019, '시뮬레이션'),
	(020, '잠입'),
	(020, '액션'),
	(020, '어드벤처'),
	(021, '오픈월드'),
	(021, 'ARPG'),
	(022, '히어로'),
	(022, '슈팅'),
	(023, '오픈월드'),
	(023, '액션'),
	(023, 'RPG'),
	(024, '배틀로얄'),
	(024, 'MOBA'),
	(025, '대전'),
	(025, '액션'),
	(026, '캐주얼'),
	(026, '레이싱'),
	(027, 'FPS'),
	(028, 'ARPG'),
	(029, '레이싱'),
	(030, '스포츠'),
	(031, '오픈월드'),
	(032, 'MMORPG'),
	(033, 'MMORPG'),
	(034, 'AOS'),
	(035, 'AOS'),
	(036, '레이싱'),
	(037, 'MMORPG'),
	(038, 'MMORPG'),
	(039, 'MMORPG'),
	(040, '액션'),
	(041, 'MMORPG'),
	(042, 'FPS'),
	(043, 'MMORPG'),
	(044, '어드벤처'),
	(045, 'FPS'),
	(046, '액션'),
	(046, 'RPG'),
	(047, 'FPS'),
	(048, '액션'),
	(048, 'RPG'),
	(049, 'AOS'),
	(050, '전락'),
	(050, '카드'),
	(051, '시뮬레이션'),
	(051, '축구'),
	(051, '스포츠'),
	(052, '액션'),
	(052, '어드벤처'),
	(053, '픽셀 그래픽'),
	(053, '사이버펑크'),
	(053, '액션'),
	(054, '협동'),
	(054, '액션'),
	(054, '로그라이크'),
	(055, '스포츠'),
	(055, '축구'),
	(055, '경쟁'),
	(056, '생존'),
	(056, '경영'),
	(057, '전략'),
	(057, '시뮬레이션'),
	(058, '사이버펑크'),
	(058, '오픈월드'),
	(059, '시뮬레이션'),
	(059, '샌드박스'),
	(060, '시뮬레이션'),
	(060, '건설'),
	(061, 'JRPG'),
	(061, '액션'),
	(062, '중세'),
	(062, '전략'),
	(062, 'RPG'),
	(063, '퍼즐'),
	(063, '협동'),
	(063, '탈출'),
	(064, '생존'),
	(064, '좀비'),
	(064, '오픈월드'),
	(065, '캐주얼'),
	(065, '리듬'),
	(065, '배틀로얄'),
	(066, '캐주얼'),
	(066, '유머'),
	(066, '경쟁'),
	(067, '전투'),
	(067, '2차세계대전'),
	(068, '카드'),
	(068, '전략'),
	(069, '중세'),
	(069, '액션'),
	(070, '로그라이크'),
	(070, '요리'),
	(070, '캐주얼'),
	(071, '액션'),
	(071, 'FPS'),
	(071, '약탈'),
	(072, '협동'),
	(072, '요리'),
	(073, '액션'),
	(073, 'RPG'),
	(073, '핵앤슬래시'),
	(074, '협동'),
	(074, '탐험'),
	(075, '액션'),
	(075, '오픈월드'),
	(075, 'FPS'),
	(076, '액션'),
	(076, '아케이드'),
	(076, '디펜스'),
	(077, '픽셀'),
	(077, '캐주얼'),
	(077, '어드벤처'),
	(077, '경영'),
	(078, '농장'),
	(078, '시뮬레이션'),
	(078, '생뢀'),
	(079, '리듬'),
	(079, '액션'),
	(079, '캐주얼'),
	(080, '공포'),
	(080, '협동'),
	(081, '전략'),
	(081, '판타지'),
	(082, '생존'),
	(082, '오픈월드'),
	(082, '샌드박스'),
	(083, 'RPG'),
	(083, '액션'),
	(083, 'FPS'),
	(084, 'JRPG'),
	(084, '전략'),
	(085, '생존'),
	(085, '오픈월드'),
	(085, '협동'),
	(086, '공포'),
	(086, '생존'),
	(086, '협동'),
	(087, '오픈월드'),
	(087, '해킹'),
	(087, '액션'),
	(088, '어드벤처'),
	(088, 'FPS'),
	(088, '협동'),
	(089, '우주'),
	(089, 'RPG'),
	(089, '오픈월드'),
	(090, '어드벤처'),
	(090, '퍼즐'),
	(091, '액션'),
	(091, '로봇'),
	(092, '생존'),
	(092, '오픈월드'),
	(092, '협동'),
	(093, '협동'),
	(093, '액션'),
	(093, '오픈월드'),
	(094, '오픈월드'),
	(094, 'FPS'),
	(095, 'RPG'),
	(095, '턴제'),
	(096, '생존'),
	(096, '오픈월드'),
	(097, '좀비'),
	(097, '생존'),
	(097, '협동'),
	(098, '좀비'),
	(098, '생존'),
	(098, '협동'),
	(099, '오픈월드'),
	(099, '액션'),
	(100, '협동'),
	(100, '퍼즐');
    
-- ---------------------Basic----------------
    
-- CPU 보기
Select CPU_Model, Price, Score from CPU;

-- GPU 보기
Select GPU_Model, Price, Score from GPU;

-- RAM 보기
Select RAM_Model, GB, Price, RAM_Score from RAM;

-- GAME 보기
Select GAME_ID, GAME_Name from GAME;

-- ESTIMATE 보기
Select * from ESTIMATE;

-- ---------------------InterMediate----------------

-- 선택된 게임의 게임스펙, 게임장르 보기
Select G.GAME_Name, S.OS, S.HDD, S.RAM_GB, S.CPU_MODEL, S.GPU_MODEL, R.GENRE
from GAME G, GAMESPEC S, GAME_GENRE R
Where G.GAME_ID = S.GAME_ID AND G.GAME_ID = R.GAME_ID;
						
-- view 만들어 게임별 점수 확인하기
create view game_score (ID, Name, CPU, CPU_Score, GPU, GPU_Score, RAM_GB)
as select G.Game_ID as ID, G.Game_Name as Name, S.CPU_Model as CPU, C.Score as CPU_Score, S.GPU_Model as GPU, GP.Score as GPU_Score, S.RAM_GB as RAM_GB
from Game G, GAMESPEC S, CPU C, GPU GP
where G.GAME_ID = S.GAME_ID and S.CPU_Model = C.CPU_Model and S.GPU_Model = GP.GPU_Model;

select * from game_score;
select * from game_score order by Score_Sum desc;
select * from game_score order by CPU_Score desc;
select * from game_score order by GPU_Score desc;

-- ---------------------advanced----------------
    
-- 선택된 컴포넌트들에 맞는 게임들 보기
select G.GAME_NAME from GAME G, GAMESPEC S
where G.GAME_ID = S.GAME_ID 
AND S.CPU_MODEL IN (select C.CPU_MODEL from CPU C
					WHERE C.score >= (Select C.score from CPU C
									  WHERE C.CPU_MODEL = 'AMD Ryzen 3 1200'))
AND S.GPU_MODEL IN (select G.GPU_MODEL from GPU G
					WHERE G.score >= (Select G.score from GPU G
									  WHERE G.GPU_MODEL = 'GeForce 8600'))
AND S.RAM_GB IN (select R.GB from RAM R
				
                WHERE R.RAM_score >= (Select R.RAM_score from RAM R
									  WHERE R.RAM_MODEL = 'IMATION DDR4-2666'));
                                      
-- 선택된 게임에 맞는 컴포넌트들 보기
Select C.CPU_Model A, C.price B
from CPU C
Where C.score >= (select CPU.score from CPU
					where CPU.CPU_MODEL = (Select S.CPU_MODEL
											from GAME G, GAMESPEC S
											Where G.GAME_ID = S.GAME_ID AND GAME_NAME = '레드데드리뎀션2')
					Limit 1)
Limit 1;

Select G.GPU_Model A, G.price B
from GPU G
Where G.score >= (select GPU.score from GPU
					where GPU.GPU_MODEL = (Select S.GPU_MODEL
											from GAME G, GAMESPEC S
											Where G.GAME_ID = S.GAME_ID AND GAME_NAME = '레드데드리뎀션2')
					Limit 1)
Limit 1;

Select R.RAM_Model, R.price
from RAM R
Where R.RAM_score >= (select RAM.RAM_score from RAM
					where RAM.GB >= (Select S.RAM_GB
											from GAME G, GAMESPEC S
											Where G.GAME_ID = S.GAME_ID AND GAME_NAME = '에이펙스레전드')
					Limit 1)
Limit 1;





-- 범준 사용 쿼리 게임, 게임장르, 게임스펙 다 조인해서 팝업창에 사용
SELECT
    G.game_name,
    GROUP_CONCAT(GG.genre) AS genres,
    GS.os,
    GS.hdd,
    GS.cpu_Model,
    GS.ram_gb,
    GS.gpu_model
FROM
    game G
JOIN
    game_genre GG ON G.game_id = GG.game_id
JOIN
    gamespec GS ON G.game_id = GS.game_id
GROUP BY
	G.game_name, GS.os, GS.hdd, GS.cpu_Model, GS.ram_gb, GS.gpu_model;





    