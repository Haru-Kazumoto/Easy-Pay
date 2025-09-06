import { GlobalThemeOverrides } from 'naive-ui'

const naiveuiThemeOverrides: GlobalThemeOverrides = {
    common: {
        primaryColor: "#00809D",
        warningColor: "#facc15",
        borderRadius: "7px",
    },
    Input: {
        borderFocus: "#facc15",
        borderHover: "#facc15"
    },
    Checkbox: {
        colorChecked: "#facc15"
    },
    Tabs: {
        colorSegment: "#00809D",
        tabTextColorSegment: "white",
        // tabTextColorHoverSegment: "#facc15",
    },
}

const naiveuiThemeOverridesLoginLayout: GlobalThemeOverrides = {
    common: {
        primaryColor: "#00809D",
        warningColor: "#facc15",
        borderRadius: "7px",
    },
    Input: {
        borderFocus: "#facc15",
        borderHover: "#facc15"
    },
    Checkbox: {
        colorChecked: "#facc15"
    },
    Form: {
        feedbackTextColorError: "#facc15"
    }
}

export default {
    naiveuiThemeOverrides,
    naiveuiThemeOverridesLoginLayout,
};