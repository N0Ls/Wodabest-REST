import Vue from "vue";

// Custom components
import About from "./About";
import AuthFilter from "./AuthFilter";
import Card from "./Card";
import Child from "./Child";
import Button from "./Button";
import Checkbox from "./Checkbox";
import CreateForm from "./Createform";
import Details from "./Details";
import Filter from "./Filter";
import Footer from "./Footer";
import GamePlayer from "./GamePlayer";
import GameView from "./GameView";
import Project from "./Project";
import ProjectsList from "./ProjectsList";
import RankedProject from "./RankedProject";
import RankedProjectsList from "./RankedProjectsList";
import SearchBar from "./SearchBar";
import Title from "./Title";

import { HasError, AlertError, AlertSuccess } from "vform";

// Components registered globaly
[
  About,
  AuthFilter,
  Card,
  Child,
  Button,
  Checkbox,
  CreateForm,
  Details,
  Filter,
  Footer,
  GamePlayer,
  GameView,
  Project,
  ProjectsList,
  RankedProject,
  RankedProjectsList,
  SearchBar,
  Title,
  HasError,
  AlertError,
  AlertSuccess
].forEach(Component => {
  Vue.component(Component.name, Component);
});
